<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    public function showTickets(Movie $movie)
    {
        $tickets = $movie->tickets; // Ambil tiket terkait film menggunakan relasi Eloquent
        return view('tickets.list', compact('movie', 'tickets'));
    }

    public function book(Movie $movie)
    {
        return view('movies.book', compact('movie'));
    }
}