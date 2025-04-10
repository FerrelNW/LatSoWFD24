@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach ($movies as $movie)
    <div class="bg-white p-4 rounded-xl shadow hover:shadow-lg transition">
        <h2 class="text-xl font-bold mb-1">{{ $movie->title }}</h2>
        <p class="text-sm mt-2">
            <strong>Release Date:</strong> {{ \Carbon\Carbon::parse($movie->release_date)->translatedFormat('l, d F Y') }}<br>
            <strong>Duration:</strong> {{ $movie->duration }} minutes
        </p>
        <div class="mt-4 flex justify-between gap-2">
            <a href="{{ route('movies.book', $movie->id) }}" class="bg-gray-300 hover:bg-gray-400 px-3 py-1 rounded shadow">Book Ticket</a>
            <a href="{{ route('movies.details', $movie->id) }}" class="bg-gray-300 hover:bg-gray-400 px-3 py-1 rounded shadow">View Details</a>
        </div>
    </div>
    @endforeach

</div>

@endsection