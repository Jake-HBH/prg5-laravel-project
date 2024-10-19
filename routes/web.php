<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ProfileController;
use App\Models\Animal;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::get('/', function () {
//    $animals = Animal::all();
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

//Route::get('/animals', function () {
//    return view('animals.index');
//});


Route::resource('animals', AnimalController::class);


Route::delete('/animals/{animal}', [AnimalController::class]);

//index = /animals (GET)
//create = /animals/create
//store = /animals (POST)
//update = /animals (PUT)
//show = /animals/{product}
//delete = /animals/{product}

//php artisan
