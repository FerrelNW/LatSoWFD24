@extends('layouts.app')
@section('content')
<h2 class="text-xl font-bold mb-2">Ticket Details for {{ $movie->title }}</h2>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Seat Number</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tickets as $ticket)
            <tr>
                <td>{{ $ticket->customer_name }}</td>
                <td>{{ $ticket->seat_number }}</td>
                <td>{{ $ticket->is_checked_in ? 'Checked In' : 'Belum' }}</td>
                <td>
                    @if(!$ticket->is_checked_in)
                        <!-- Jika belum check-in, tampilkan tombol check-in dan delete -->
                        <form action="{{ route('tickets.checkin', $ticket->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary">Check In</button>
                        </form>
                        <form action="{{ route('tickets.delete', $ticket->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @else
                        <!-- Jika sudah check-in, hanya tampilkan tombol delete -->
                        <form action="{{ route('tickets.delete', $ticket->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
