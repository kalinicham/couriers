@extends('layouts.app');

@section('content')

    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-black text-sm rounded px-4 py-3 text-center">
            <ul class="text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="max-w-sm mx-auto mt-8 p-6 bg-white shadow-md rounded-md">
        <h2 class="text-xl mb-4">Login page</h2>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block">Email</label>
                <input type="email" name="email" id="email" class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block">Password</label>
                <input type="password" name="password" id="password" class="w-full p-2 border rounded" required>
            </div>

            <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded">Log in</button>
        </form>
    </div>
@endsection
