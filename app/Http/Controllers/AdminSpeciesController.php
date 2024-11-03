<?php

namespace App\Http\Controllers;

use App\Models\Species;
use Illuminate\Http\Request;

class AdminSpeciesController extends Controller
{
    public function index()
    {
//withcount haalt alle species op maar telt ook gelijk hoeveel er zijn zodat je makkelijker een hoeveelheid hebt. dit word geaccessed met
        $species = Species::withCount('animals')->get();
        return view('admin.species.index', compact('species'));
    }



    public function create()
    {
        $species = Species::all(); //pakt alle species uit de database
        return view('admin.species.create', compact('species')); // dit geeft de species door aan de view
    }


    public function store(Request $request)
    {
        $request->validate([
            'species' => 'required|string|max:255',
        ]);

        Species::create([
            'species' => $request->species,
        ]);

        return redirect()->route('admin.species.index')->with('success', 'Species added successfully.');
    }



    public function edit(Species $species)
    {
        return view('admin.species.edit', compact('species'));
    }

    public function update(Request $request, Species $species)
    {
        $request->validate([
            'species' => 'required|string|max:255',
        ]);

        $species->update([
            'species' => $request->species,
        ]);

        return redirect()->route('admin.species.index')->with('success', 'Species updated successfully.');
    }


    public function destroy(Species $species)
    {
        $species->delete();
        return redirect()->route('admin.species.index')->with('success', 'Species deleted successfully.');
    }
}
