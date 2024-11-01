<?php

use App\Http\Controllers\AdminAnimalController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

// dashboard voor admin
Route::get('/dashboard', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return view('admin.dashboard');
    }
    return redirect('/');
})->middleware('auth')->name('dashboard');

// profiel bekijken en editen
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// home pagina
Route::get('/', fn() => view('home'))->name('home');

// about pagina
Route::get('/about', fn() => view('about'))->name('about');

// animal paginas waar je niet mag komen zonder ingelogd te zijn, met index en show (details) als uitzondering, daar mag iedereen kijken
// dit zijn create, store, edit, destroy, update
Route::middleware('auth')->group(function () {
    Route::get('/animals/create', [AnimalController::class, 'create'])->name('animals.create');
    Route::post('/animals', [AnimalController::class, 'store'])->name('animals.store');
    Route::get('/animals/{animal}/edit', [AnimalController::class, 'edit'])->name('animals.edit');
    Route::patch('/animals/{animal}', [AnimalController::class, 'update'])->name('animals.update');
    Route::delete('/animals/{animal}', [AnimalController::class, 'destroy'])->name('animals.destroy');
});

// publieke routes voor alle gebruikers om dieren te bekijken
Route::get('/animals', [AnimalController::class, 'index'])->name('animals.index');
Route::get('/animals/{animal}', [AnimalController::class, 'show'])->name('animals.show');

// admin-routes voor het beheren van dieren, alleen toegankelijk voor admin
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/animals', [AdminAnimalController::class, 'index'])->name('admin.animals.index');
    Route::get('/admin/animals/create', [AdminAnimalController::class, 'create'])->name('admin.animals.create');
    Route::post('/admin/animals', [AdminAnimalController::class, 'store'])->name('admin.animals.store');
    Route::get('/admin/animals/{animal}/edit', [AdminAnimalController::class, 'edit'])->name('admin.animals.edit');
    Route::patch('/admin/animals/{animal}', [AdminAnimalController::class, 'update'])->name('admin.animals.update');
    Route::delete('/admin/animals/{animal}', [AdminAnimalController::class, 'destroy'])->name('admin.animals.destroy');
    Route::post('/admin/animals/{animal}/publish', [AdminAnimalController::class, 'publish'])->name('admin.animals.publish');
    Route::post('/admin/animals/{animal}/unpublish', [AdminAnimalController::class, 'unpublish'])->name('admin.animals.unpublish');
});
