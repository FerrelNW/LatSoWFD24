@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded-xl shadow-md mt-6 ">
    @if (session('success') || isset($success))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') ?? $success }}
        </div>
    @endif

    <h1 class="text-2xl font-bold text-gray-800 mb-4">🎥 Pesan Tiket</h1>
    {{-- info Movie --}}
        <div class="mb-6 text-sm text-gray-700" >
            <p><strong>Movie Title:</strong>{{ $movie->movie_title}}</p>
            <p><strong>Release Date:</strong> {{ \Carbon\Carbon::parse($movie->release_date)->format('d F Y') }}</p>
            <p><strong>Duration:</strong> {{ $movie->duration }} menit</p>
        </div>
    {{-- Form Booking --}}
    <form method="POST" action="{{ route('ticket.submit') }}" class="space-y-4">
        @csrf

        {{-- Hidden Movie ID --}}
        <input type="hidden" name="movie_id" value="{{ $movie->id }}">

        <div>
            <label class="block text-sm font-medium text-gray-700">Customer Name</label>
            <input type="text" name="customer_name" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded" required>
            @error('customer_name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Seat Number</label>
            <input type="text" name="seat_number" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded" required maxlength="5">
            @error('seat_number')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between items-center mt-4">
            <a href="/" class="text-gray-600 text-sm">Back to Movies List</a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition duration-300">Booking Ticket</button>
        </div>
        </form>
</div>

@endsection