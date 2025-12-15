<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RouteController::class, 'index'])->name('home');

Route::get('/tutorial', function () {
    return view('tutorial');
});

Route::get('/bonus', function () {
    return view('bonus.index');
})->name('bonus.index');

Route::get('/bonus/create', function () {
    return view('bonus.create');
})->name('bonus.create');

Route::get('/bonus/{bonus}/edit', function ($bonus) {
    return view('bonus.edit', ['bonus' => $bonus]);
})->name('bonus.edit');

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
