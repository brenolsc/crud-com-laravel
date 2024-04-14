<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name(name:'home');
/* Route::get('/users', [UserController::class, 'index'])->name(name:'users.index');
Route::get('/users/create', [UserController::class, 'create'])->name(name:'users.create');
Route::post('/users', [UserController::class, 'store'])->name(name:'users.store');
Route::post('/users/{user}', [UserController::class, 'show'])->name(name:'users.show');
Route::post('/users/{user}/edit', [UserController::class, 'edit'])->name(name:'users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name(name:'users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name(name:'users.destroy'); */
Route::resource('users', UserController::class);