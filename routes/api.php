<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HumanController;
use App\Http\Controllers\RodovayaknigaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register',[AuthController::class,'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {

    Route::resource('rodovayakniga', RodovayaknigaController::class);
    Route::resource('human', HumanController::class);

});