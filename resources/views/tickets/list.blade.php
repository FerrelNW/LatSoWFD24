@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow-md mt-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">🎟️ Tiket untuk {{ $movie->movie_title }}</h2>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
            {{ session('error') }}
        </div>
    @endif

    @if ($tickets->isEmpty())
        <p class="text-gray-600">Belum ada tiket untuk film ini.</p>
    @else
        <div class="overflow-x-auto">
            <table class="w-full border-separate border-spacing-0 rounded-lg shadow-sm">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 uppercase text-sm font-semibold">
                        <th class="border-t border-l border-r border-gray-200 p-3 text-left rounded-tl-lg">Name</th>
                        <th class="border-t border-r border-gray-200 p-3 text-left">Seat Number</th>
                        <th class="border-t border-r border-gray-200 p-3 text-left">Status</th>
                        <th class="border-t border-r border-gray-200 p-3 text-left rounded-tr-lg">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="border-b border-l border-r border-gray-200 p-3">{{ $ticket->customer_name }}</td>
                            <td class="border-b border-r border-gray-200 p-3">{{ $ticket->seat_number }}</td>
                            <td class="border-b border-r border-gray-200 p-3">
                                @if ($ticket->is_checked_in)
                                    <span class="inline-block px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">Checked In</span>
                                    <br>
                                    <small class="text-gray-500">{{ \Carbon\Carbon::parse($ticket->check_in_time)->format('d F Y H:i') }}</small>
                                @else
                                    <span class="inline-block px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">Belum</span>
                                @endif
                            </td>
                            <td class="border-b border-r border-gray-200 p-3">
                                @if(!$ticket->is_checked_in)
                                    <form action="{{ route('ticket.checkin', $ticket->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="px-3 py-1 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition duration-200">Check In</button>
                                    </form>
                                    <form action="{{ route('ticket.delete', $ticket->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-red-600 text-white text-sm rounded-lg hover:bg-red-700 transition duration-200 ml-2" onclick="return confirm('Are you sure you want to delete this ticket?')">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="mt-4">
        <a href="{{ route('movies.index') }}" class="text-gray-600 text-sm">Back to Movies List</a>
    </div>
</div>
@endsection