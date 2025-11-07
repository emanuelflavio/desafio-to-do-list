<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('login', [AuthController::class, 'showLogin'])->name('login.show');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::resource('/tasks', TaskController::class);
    Route::post('tasks/{id}/restore', [TaskController::class, 'restore'])->name('tasks.restore');
    Route::delete('tasks/{id}/force', [TaskController::class, 'forceDelete'])->name('tasks.forceDelete');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
