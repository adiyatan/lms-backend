<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\ModuleController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\SpeakerController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', RegisterController::class)->name('register');
Route::post('/login', LoginController::class)->name('login');
Route::post('/logout', LogoutController::class)->name('logout');

Route::middleware('auth:api')->group(function () {
    Route::apiResource('modules', ModuleController::class);
    Route::get('/get-speaker-modules', [SpeakerController::class, 'getSpeakerModules']);
    Route::get('/get-all-users', [UserController::class, 'getAllUsers']);
    Route::get('/get-all-modules-group-link', [ModuleController::class, 'getAllModulesGroupLink']);
});
