<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TicketController;

// Movies
Route::get('/', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/tickets/{movie:id}', [MovieController::class, 'showTickets'])->name('movies.tickets');
Route::get('/movies/book/{movie:id}', [MovieController::class, 'book'])->name('movies.book');

// Tickets
Route::post('/ticket/submit', [TicketController::class, 'submit'])->name('ticket.submit');
Route::put('/ticket/checkin/{ticket:id}', [TicketController::class, 'checkIn'])->name('ticket.checkin');
Route::delete('/ticket/delete/{ticket:id}', [TicketController::class, 'delete'])->name('ticket.delete');