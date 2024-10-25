<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ProfileController;
use App\Models\Animal;
use Illuminate\Support\Facades\Route;

// dashboard voor ingelogde users/admin
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// profiel bekijken en editen
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//public routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::middleware('auth')->group(function () {
    // de methods van mijn animalcontroller (index, create, store, show, edit, update, destroy)
    Route::resource('animals', AnimalController::class)->except(['index', 'show']);  // index and show kunnen nog public blijven en hebben geen inlog nodig

    // Route::post('/animals', [AnimalController::class, 'store'])
    //->name('animals.store');

    // Route::get('/animals/create', [AnimalController::class, 'create'])
    //->name('animals.create');

    Route::delete('/animals/{animal}', [AnimalController::class, 'destroy'])->name('animals.destroy');
});

Route::get('/animals', [AnimalController::class, 'index'])->name('animals.index');
Route::get('/animals/{animal}', [AnimalController::class, 'show'])->name('animals.show');  // Public
