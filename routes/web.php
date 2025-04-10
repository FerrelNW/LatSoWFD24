<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;


Route::get('/', [MovieController::class, 'index']);
Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies/{movie}/book', [MovieController::class, 'book'])->name('movies.book');
Route::get('/movies/{movie}/details', [MovieController::class, 'details'])->name('movies.details');
