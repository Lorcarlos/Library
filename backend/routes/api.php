<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;

Route::get('/books', [LibroController::class, 'index']);
Route::get('/books/{id}', [LibroController::class, 'show']);
Route::post('/books', [LibroController::class, 'store']);
Route::put('/books/{id}', [LibroController::class, 'update']);
Route::delete('/books/{id}', [LibroController::class, 'destroy']);
