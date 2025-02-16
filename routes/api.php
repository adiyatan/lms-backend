<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\MaterialController;
use App\Http\Controllers\Api\ModuleController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\SpeakerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', RegisterController::class)->name('register');
Route::post('/login', LoginController::class)->name('login');
Route::post('/logout', LogoutController::class)->name('logout');

Route::middleware('auth:api')->group(function () {
    Route::apiResource('modules', ModuleController::class);
    Route::get('/get-speaker-modules', [SpeakerController::class, 'getSpeakerModules']);
});
