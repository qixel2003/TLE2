<?php

use App\Http\Controllers\ActiveRouteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;
use App\Models\Checkpoint;

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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/route-test', [RouteController::class, 'index'])
    ->middleware('auth')
    ->name('route-test');

Route::post('/routes/{route}/start', [ActiveRouteController::class, 'store'])
    ->middleware('auth')
    ->name('routes.start');
Route::get('/active-routes/{active_route}/select', [ActiveRouteController::class, 'select'])
    ->middleware('auth')
    ->name('active-routes.select');
Route::patch('/active-routes/{active_route}/role', [ActiveRouteController::class, 'updateRole'])
    ->middleware('auth')
    ->name('active-routes.update-role');
Route::get('/active-routes/{activeRoute}/mission', [ActiveRouteController::class, 'mission'])
    ->middleware('auth')
    ->name('active-routes.mission');
Route::patch('/active-routes/{activeRoute}/complete', [ActiveRouteController::class, 'complete'])
    ->middleware('auth')
    ->name('active-routes.complete');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
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

require __DIR__ . '/auth.php';
