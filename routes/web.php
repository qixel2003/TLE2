<?php

use App\Http\Controllers\ActiveRouteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
