<?php

use App\Http\Controllers\Auth\TokenController;
use App\Http\Controllers\ColorPaletteController;
use App\Http\Controllers\DesignStyleController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Tokens
Route::post('/tokens', [TokenController::class, 'store'])->middleware(['guest:sanctum'])->withoutMiddleware(['auth:sanctum']);
Route::delete('/tokens', [TokenController::class, 'destroy']);

// Users
Route::apiResource('/users', UserController::class)->only(['store'])->middleware(['guest:sanctum'])->withoutMiddleware(['auth:sanctum']);
Route::get('/me', [UserController::class, 'me']);

// Projects
Route::apiResource('/projects', ProjectController::class)->only(['store', 'show', 'update']);

Route::get('/design-styles', [DesignStyleController::class, 'index']);
Route::get('/color-palettes', [ColorPaletteController::class, 'index']);
