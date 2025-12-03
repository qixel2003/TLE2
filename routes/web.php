<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// School routes
Route::middleware('auth')->group(function () {
    Route::get('/school', function () {
        if (!auth()->check() || (int) auth()->user()->role !== 1) {
            abort(403, 'Unauthorized action.');
        }

        return view('school.dashboard');
    })->name('admin');
});

Route::get('/school', [SchoolController::class, 'dashboard'])
    ->name('school.dashboard')
    ->middleware('auth');

// classroom
Route::middleware('auth')->group(function () {
    Route::get('classrooms/{classroom}/edit', [\App\Http\Controllers\ClassroomController::class, 'edit'])->name('classrooms.edit');
    Route::resource('classrooms', App\Http\Controllers\ClassroomController::class);
});

require __DIR__.'/auth.php';
