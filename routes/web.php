<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\BonusController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RouteController::class, 'index'])->name('home');

Route::get('/tutorial', function () {
    return view('tutorial');
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/routes', [RouteController::class, 'index'])->name('routes.index');
Route::get('/routes/create', [RouteController::class, 'create'])->name('routes.create');
Route::post('/routes', [RouteController::class, 'store'])->name('routes.store');
Route::get('/routes/{route}', [RouteController::class, 'show'])->name('routes.show');
Route::get('/routes/{route}/edit', [RouteController::class, 'edit'])->name('routes.edit');
Route::put('/routes/{route}', [RouteController::class, 'update'])->name('routes.update');
//Route::delete('/routes/{route}', [RouteController::class, 'destroy'])->name('routes.destroy');

Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
Route::get('/messages/{message}/edit', [MessageController::class, 'edit'])->name('messages.edit');
Route::put('/messages/{message}', [MessageController::class, 'update'])->name('messages.update');
Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

Route::get('/photos/create', [BonusController::class, 'create'])->name('photos.create');
Route::post('/photos', [BonusController::class, 'store'])->name('photos.store');
Route::post('/photos/{photo}/approve', [BonusController::class, 'approve'])->name('photos.approve');
Route::post('/photos/{photo}/reject', [BonusController::class, 'reject'])->name('photos.reject');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
