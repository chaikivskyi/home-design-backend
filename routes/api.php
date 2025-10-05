<?php

use App\Http\Controllers\Auth\TokenController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Tokens
Route::post('/tokens', [TokenController::class, 'store'])->withoutMiddleware(['auth:sanctum']);
Route::delete('/tokens', [TokenController::class, 'destroy']);

// Users
Route::apiResource('/users', UserController::class)->only(['store'])->withoutMiddleware(['auth:sanctum']);
Route::get('/me', [UserController::class, 'me']);
