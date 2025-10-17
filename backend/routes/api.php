<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/books', [LibroController::class, 'index']);
Route::get('/books/{id}', [LibroController::class, 'show']);
Route::post('/books', [LibroController::class, 'store']);
Route::put('/books/{id}', [LibroController::class, 'update']);
Route::delete('/books/{id}', [LibroController::class, 'destroy']);



Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);



Route::post('/login', [AuthController::class, 'login']);
