<?php

use App\Http\Controllers\ActiveRouteController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteController;
use App\Models\Active_Route;
use App\Http\Controllers\SchoolController;
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

Route::get('/role', function () {
    $activeRoute = Active_Route::where('student_id', auth()->user()->student->id)
        ->where('is_completed', false)
        ->latest()
        ->firstOrFail();

    return view('role', compact('activeRoute'));
})->middleware('auth')->name('role');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

Route::post('/routes/{route}/start', [ActiveRouteController::class, 'store'])
    ->middleware('auth')
    ->name('routes.start');
Route::get('/active-routes/{active_route}/select', [ActiveRouteController::class, 'select'])
    ->middleware('auth')
    ->name('active-routes.select');
Route::patch('/active-routes/{active_route}/role', [ActiveRouteController::class, 'updateRole'])
    ->middleware('auth')
    ->name('active-routes.update-role');
Route::patch('/active-routes/{activeRoute}/complete', [ActiveRouteController::class, 'complete'])
    ->middleware('auth')
    ->name('active-routes.complete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


Route::get('/checkpoints', function () {
    $checkpoints = Checkpoint::with('mission')->orderBy('checkpoint')->get();
    return view('checkpoints.index', compact('checkpoints'));
})->name('checkpoints');

Route::get('/checkpoints/{id}', function ($id) {
    $checkpoint = Checkpoint::with('mission')->findOrFail($id);

    // Get the user's active route
    $activeRoute = Active_Route::where('student_id', auth()->user()->student->id)
        ->where('is_completed', false)
        ->latest()
        ->first();

    return view('checkpoints.show', compact('checkpoint', 'activeRoute'));
})->middleware('auth')->name('missions');


Route::resource('badges', BadgeController::class);


require __DIR__ . '/auth.php';
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
