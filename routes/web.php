<?php

use App\Http\Controllers\AdminAnimalController;
use App\Http\Controllers\AdminSpeciesController;
use App\Http\Controllers\AdminUserController;
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

// public routes voor alle gebruikers om dieren te bekijken
Route::get('/animals', [AnimalController::class, 'index'])->name('animals.index');
Route::get('/animals/{animal}', [AnimalController::class, 'show'])->name('animals.show');

// admin animals posts overview
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

//admin species overview
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/species', [AdminSpeciesController::class, 'index'])->name('admin.species.index');
    Route::get('/admin/species/create', [AdminSpeciesController::class, 'create'])->name('admin.species.create');
    Route::post('/admin/species', [AdminSpeciesController::class, 'store'])->name('admin.species.store');
    Route::get('/admin/species/{species}/edit', [AdminSpeciesController::class, 'edit'])->name('admin.species.edit');
    Route::patch('/admin/species/{species}', [AdminSpeciesController::class, 'update'])->name('admin.species.update');
    Route::delete('/admin/species/{species}', [AdminSpeciesController::class, 'destroy'])->name('admin.species.destroy');
});

//admin users overview
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::patch('/admin/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
    Route::patch('/admin/users/{user}/activate', [AdminUserController::class, 'activate'])->name('admin.users.activate');
    Route::patch('/admin/users/{user}/deactivate', [AdminUserController::class, 'deactivate'])->name('admin.users.deactivate');
});

//premium feature view voor users die 5 of meer dieren hebben gepost
Route::get('/premium-feature', [AnimalController::class, 'premiumFeature'])
    ->name('premium.feature')
    ->middleware('auth');


