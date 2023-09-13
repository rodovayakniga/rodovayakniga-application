<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RodovayaknigaController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::group(['prefix' => '/app'], function () {

        Route::get('/', function () {
            return inertia('Dashboard');
        })->name('dashboard');

        Route::get('/rodovayakniga', [RodovayaknigaController::class, 'index'])->name('rodovayakniga');
        Route::get('/rodovayakniga/show/{rodovayakniga}', [RodovayaknigaController::class, 'show'])->name('rodovayakniga.show');
        Route::get('/rodovayakniga/add', [RodovayaknigaController::class, 'add'])->name('rodovayakniga.add');
        Route::post('/rodovayakniga/store', [RodovayaknigaController::class, 'store'])->name('rodovayakniga.store');
        Route::delete('/rodovayakniga/delete/{rodovayakniga}', [RodovayaknigaController::class, 'destroy'])->name('rodovayakniga.destroy');


    });
});



Route::get('/rodovayakniga', function () {
    return inertia('Rodovayakniga/Index');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
