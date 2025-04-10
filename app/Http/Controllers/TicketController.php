<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'customer_name' => 'required|string|max:100',
            'seat_number' => 'required|string|max:5|alpha_num',
        ]);

        Ticket::create([
            'movie_id' => $request->movie_id,
            'customer_name' => $request->customer_name,
            'seat_number' => $request->seat_number,
            'is_checked_in' => false,
        ]);

        return redirect()->route('movies.tickets', $request->movie_id)
                         ->with('success', 'Ticket successfully booked!');
    }

    public function checkIn(Ticket $ticket)
    {
        if ($ticket->is_checked_in) {
            return redirect()->back()->with('error', 'Ticket already checked in!');
        }

        $ticket->update([
            'is_checked_in' => true,
            'check_in_time' => now(),
        ]);

        return redirect()->route('movies.tickets', $ticket->movie_id)
                         ->with('success', 'Ticket successfully checked in!');
    }

    public function delete(Ticket $ticket)
    {
        if ($ticket->is_checked_in) {
            return redirect()->back()->with('error', 'Ticket already checked in, cannot be deleted.');
        }

        $movieId = $ticket->movie_id; // Simpan movie_id sebelum hapus
        $ticket->delete();

        return redirect()->route('movies.tickets', $movieId)
                         ->with('success', 'Ticket successfully deleted.');
    }
}