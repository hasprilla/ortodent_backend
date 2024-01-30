<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\MeController;

Route::middleware(['auth:sanctum'])->get('/auth/me', function (Request $request) {
    return  $request->user();
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::post('register', [RegisteredUserController::class, 'store']);
});



