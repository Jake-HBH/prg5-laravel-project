<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Specie;
use App\Models\Species;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnimalController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
//        $latestAnimals = Animal::whereHas('user', function($query) {
//        })->latest()->take(3)->get();

        $latestAnimals = Animal::latest()->with('user', 'species')->take(3)->get();

        $filteredAnimal = $request->get('filter');
        $searchTerm = $request->get('search');

        $query = Animal::query();

        //normale gebruikers kunnen alleen de published animals zien
        if (Auth::check() && Auth::user()->role !== 'admin') {
            $query->where('published', true);
        }

        if ($filteredAnimal) {
            $query->where('species_id', $filteredAnimal);
        }

//sql queries
        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                    ->orWhere('description', 'like', "%{$searchTerm}%")
                    ->orWhere('address', 'like', "%{$searchTerm}%");
            });
        }

        // op volgorde van nieuw naar oud
        $animals = $query->with('species')->orderBy('created_at', 'desc')->get();


        // alle species ophalen
        $species = Species::all();

        return view('animals.index', [
            'latestAnimals' => $latestAnimals,
            'animals' => $animals,
            'filteredAnimal' => $filteredAnimal,
            'species' => $species,
            'searchTerm' => $searchTerm,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//pakt alle species uit de database
        $species = Species::all();

//geeft de species data door aan de view van create
        return view('animals.create', compact('species'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // POST
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'species_id' => 'required|exists:species,id',
            'image_url' => 'required|url',
            'adoption_status' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'address' => 'required',
        ]);

        Animal::create([
            'user_id' => Auth::user()->id,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'species_id' => $request->input('species_id'),
            'image_url' => $request->input('image_url'),
            'adoption_status' => $request->input('adoption_status'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'published' => false,
        ]);

        return redirect()->route('animals.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        return view('animals.show', [
            'animal' => $animal
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        if (Auth::user()->id !== $animal->user_id) {
            return redirect()->route('animals.index');
        }

        $species = Species::all();
        return view('animals.edit', compact('animal', 'species'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'species_id' => 'required|exists:species,id',
            'age' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'image_url' => 'required|url',
        ]);

        $animal->update($request->only([
            'name', 'description', 'species_id', 'age', 'gender', 'address', 'image_url'
        ]));


        return redirect()->route('animals.show', $animal);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
//        kijkt of de id van de ingelogde gebruiker (Auth::user()->id) gelijk is aan de user_id van het dier dat je wilt verwijderen.
//        als ze niet gelijk zijn, dan word je teruggestuurd naar de index met een foutmelding dat ze geen toestemming hebben om dat dier te verwijderen.
        if (Auth::user()->id !== $animal->user_id) {
            return redirect()->route('animals.index');
        }

        $animal->delete();

        return redirect()->route('animals.index');
    }

    public function publish(Animal $animal)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $animal->update(['published' => true]);
            return redirect()->route('admin.animals.index');
        }

        return redirect()->route('animals.index');
    }



    public function unpublish(Animal $animal)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $animal->update(['published' => false]);
            return redirect()->route('admin.animals.index');
        }

        return redirect()->route('animals.index');
    }



    public function premiumFeature()
    {
        $user = Auth::user();

        // telt het aantal dieren die de user heeft gepost
        $animalCount = Animal::where('user_id', $user->id)->count();

        $youtubeVideo = "https://www.youtube.com/embed/watch?v=d-diB65scQU";



//check voor of de user tenminste 5 dieren heeft gepost
        if ($animalCount < 5) {
            return redirect()->route('animals.index')
                ->with('error', 'Je moet minstens 5 dieren toevoegen om deze premium functie te gebruiken.');
        }

        return view('premium.feature', compact('youtubeVideo'));
    }
}
