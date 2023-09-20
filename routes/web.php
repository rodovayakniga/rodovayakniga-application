<?php

use App\Http\Controllers\App\GenerationController;
use App\Http\Controllers\App\RodovayaknigaController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::group(['prefix' => '/app'], function () {

        /* Dashboard */
        Route::get('/', function () {
            return inertia('Dashboard');
        })->name('dashboard');

        /* Profile */
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        /* Rodovayakniga */
        Route::get('/rodovayakniga', [RodovayaknigaController::class, 'index'])->name('rodovayakniga.index');
        Route::get('/rodovayakniga/show/{rodovayakniga}', [RodovayaknigaController::class, 'show'])->name('rodovayakniga.show');
        Route::get('/rodovayakniga/add', [RodovayaknigaController::class, 'add'])->name('rodovayakniga.add');
        Route::get('/rodovayakniga/edit/{rodovayakniga}', [RodovayaknigaController::class, 'edit'])->name('rodovayakniga.edit');
        Route::patch('/rodovayakniga/update/{rodovayakniga}', [RodovayaknigaController::class, 'update'])->name('rodovayakniga.update');
        Route::post('/rodovayakniga/store', [RodovayaknigaController::class, 'store'])->name('rodovayakniga.store');
        Route::delete('/rodovayakniga/delete/{rodovayakniga}', [RodovayaknigaController::class, 'destroy'])->name('rodovayakniga.destroy');

        /* Generations */
        Route::resource('generations', GenerationController::class);
    });
});

require __DIR__.'/auth.php';
