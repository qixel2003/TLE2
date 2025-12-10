<?php

use App\Http\Controllers\ActiveRouteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteController;
use App\Models\Active_Route;
use Illuminate\Support\Facades\Route;
use App\Models\Checkpoint;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/tutorial', function () {
    return view('tutorial');
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/routes', [RouteController::class, 'index'])
    ->middleware('auth')
    ->name('routes.index');
Route::get('/routes/create', [RouteController::class, 'create'])
    ->middleware('auth')
    ->name('routes.create');
Route::post('/routes', [RouteController::class, 'store'])
    ->middleware('auth')
    ->name('routes.store');
Route::get('/routes/{route}', [RouteController::class, 'show'])
    ->middleware('auth')
    ->name('routes.show');
Route::get('/routes/{route}/edit', [RouteController::class, 'edit'])
    ->middleware('auth')
    ->name('routes.edit');
Route::put('/routes/{route}', [RouteController::class, 'update'])
    ->middleware('auth')
    ->name('routes.update');
//Route::delete('/routes/{route}', [RouteController::class, 'destroy'])->name('routes.destroy');

Route::middleware(['auth'])->group(function () {
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

    // Log user and student information
    \Log::info('User ID: ' . auth()->id());
    \Log::info('User: ' . json_encode(auth()->user()));
    \Log::info('Student: ' . json_encode(auth()->user()->student));
    \Log::info('Student ID: ' . (auth()->user()->student ? auth()->user()->student->id : 'null'));

    // Get the user's active route
    $activeRoute = Active_Route::where('student_id', auth()->user()->student->id)
        ->where('is_completed', false)
        ->latest()
        ->first();

    \Log::info('Active Route: ' . json_encode($activeRoute));

    return view('checkpoints.show', compact('checkpoint', 'activeRoute'));
})->middleware('auth')->name('missions');


require __DIR__ . '/auth.php';
