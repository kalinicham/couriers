@extends('home')

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

    <div class="max-w-sm mx-auto mt-8 p-6 bg-white shadow-md rounded-md self-start">
        <h2 class="text-xl mb-4">Register page</h2>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Password confirmation</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <x-submit-button>Register</x-submit-button>
        </form>
    </div>
@endsection
