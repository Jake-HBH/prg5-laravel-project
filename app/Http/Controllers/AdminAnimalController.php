<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Specie;
use App\Models\Species;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::all();
        return view('admin.animals.index', compact('animals'));
    }


    public function create()
    {
        $species = Species::all();
        return view('admin.animals.create', compact('species'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'species_id' => 'required',
            'image_url' => 'required|url',
            'adoption_status' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'address' => 'required',
        ]);

        Animal::create($request->all());

        return redirect()->route('admin.animals.index');
    }

    public function edit(Animal $animal)
    {
        $species = Species::all();
        return view('admin.animals.edit', compact('animal', 'species'));
    }



    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'species_id' => 'required',
            'image_url' => 'required|url',
            'adoption_status' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'address' => 'required',
        ]);

        $animal->update($request->all());

        return redirect()->route('admin.animals.index');
    }


    public function destroy(Animal $animal)
    {
        $animal->delete();

        return redirect()->route('admin.animals.index');
    }

    public function publish(Animal $animal)
    {
        $animal->update(['published' => true]);
        return redirect()->route('admin.animals.index');
    }

    public function unpublish(Animal $animal)
    {
        $animal->update(['published' => false]);
        return redirect()->route('admin.animals.index');
    }
}

