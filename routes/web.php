<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Checkpoint;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/checkpoints', function () {
    $checkpoints = Checkpoint::with('mission')->orderBy('checkpoint')->get();
    return view('checkpoints.index', compact('checkpoints'));
})->name('checkpoints');

Route::get('/checkpoints/{id}', function ($id) {
    $checkpoint = Checkpoint::with('mission')->findOrFail($id);
    return view('checkpoints.show', compact('checkpoint'));
})->name('missions');

Route::middleware(['auth'])->group(function () {
    Route::get('/photos', [PhotoController::class, 'index'])->name('photos.index');
    Route::get('/photos/create', [PhotoController::class, 'create'])->name('photos.create');
    Route::post('/photos', [PhotoController::class, 'store'])->name('photos.store');
    Route::get('/photos/{photo}', [PhotoController::class, 'show'])->name('photos.show');
    Route::get('/photos/{photo}/edit', [PhotoController::class, 'edit'])->name('photos.edit');
});
Route::resource('photos', PhotoController::class);

Route::post('/photos/{photo}/comments', [CommentController::class, 'store'])
    ->name('comments.store')
    ->middleware('auth');



require __DIR__ . '/auth.php';
