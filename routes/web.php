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
        if (auth()->user()->role !== 1) {
            abort(403, 'Unauthorized action.');
        }

        return app(SchoolController::class)->dashboard();
    })->name('school.dashboard');

    // Resource routes voor school

});Route::resource('school', SchoolController::class)->except(['index']);



// classroom
Route::middleware('auth')->group(function () {
    Route::get('classrooms/{classroom}/edit', [\App\Http\Controllers\ClassroomController::class, 'edit'])->name('classrooms.edit');
    Route::resource('classrooms', App\Http\Controllers\ClassroomController::class);
    Route::post('classrooms/{classroom}/addStudent', [\App\Http\Controllers\ClassroomController::class, 'addStudent'])->name('classrooms.addStudent');
});

// student
Route::middleware('auth')->group(function () {
    Route::get('/student', function () {
        return view('student.dashboard');
    })->name('student.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/student', [App\Http\Controllers\StudentController::class, 'index'])->name('student.dashboard');
    Route::resource('student', App\Http\Controllers\StudentController::class);
});
require __DIR__.'/auth.php';
