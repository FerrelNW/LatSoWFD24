<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TicketController;

// movies
Route::get('/', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/tickets/{movie:id}', [MovieController::class, 'showTickets'])->name('movies.tickets');
Route::get('/movies/book/{movie:id}', [MovieController::class, 'book'])->name('movies.book');

//tickets
Route::post('ticket/submit', [TicketController::class,'submit'])->name('ticket.submit');
Route::put('ticket/checkIn/{id}', [TicketController::class,'checkIn'])->name('ticket.checkIn');
Route::put('/ticket/checkin/{ticket:id}', [TicketController::class, 'checkIn'])->name('ticket.checkin');