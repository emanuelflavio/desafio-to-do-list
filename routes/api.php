<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Route::prefix('auth')->group(function () {
//     Route::post('/register', [AuthController::class, 'register']);
//     Route::post('/login', [AuthController::class, 'login']);
// });

// Route::middleware('auth:sanctum')->group(function() {
//     Route::resource('task', TaskController::class);
//     Route::get('task/delete', [TaskController::class, 'showSoftDelete']);
//     Route::patch('tasks/{id}/restore', [TaskController::class, 'restore']);
//     Route::delete('tasks/{id}/force', [TaskController::class, 'forceDelete']);
//     Route::post('auth/logout', [AuthController::class, 'logout']);
// });

