<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

//route/pagina om *alleen* de naam te zien(?)
Route::get('/home/{name}', function (string $name) {
    return "This person's name is: ".$name;
});

//route/pagina om naam *en* adres te laten zien(?)
Route::get('home/{name}/address/{address}', function (string $name, string $address) {
    return "This person's name is: ".$name. " and their address is: ".$address;
});


Route::get('products/{name}', [ProductController::class, 'show']);



