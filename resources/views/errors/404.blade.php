@extends('home')

@section('content')
    <div class="flex flex-col items-center justify-center text-center px-4" style="margin: auto">
        <h1 class="text-6xl font-bold text-red-500">404</h1>
        <p class="text-2xl mt-4">Oops! Page not found.</p>
        <p class="mt-2 text-gray-500">Perhaps it was moved or never existed.</p>
        <a href="{{ route('home') }}" class="mt-6 inline-block bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition">
            Return to home page
        </a>
    </div>
@endsection
