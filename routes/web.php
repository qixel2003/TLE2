<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RouteController::class, 'index'])
    ->name('routes.index');
Route::get('/routes', [RouteController::class, 'index'])
    ->name('routes.index');
Route::get('/routes/create', [RouteController::class, 'create'])
    ->name('routes.create');
Route::post('/routes', [RouteController::class, 'store'])
    ->name('routes.store');
Route::get('/routes/{id}', [RouteController::class, 'show'])
    ->name('routes.show');

Route::get('/tutorial', function () {
    return view('tutorial');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
