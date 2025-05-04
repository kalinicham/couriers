@extends('layouts.app')

@section('header')
    <nav class="flex items-center justify-end gap-4">
        @guest
            <x-nav-link href="{{ route('register') }}">Register</x-nav-link>
            <x-nav-link href="{{ route('login') }}">Log in</x-nav-link>
        @endguest
        @auth
            <x-nav-link href="{{ url('/dashboard') }}">Dashboard</x-nav-link>
            <form method="POST" action="/logout">
                @csrf
                <x-submit-button class="px-4">Log out</x-submit-button>
            </form>
        @endauth
    </nav>
@endsection

@section('content')
    <div class="max-w-sm mx-auto mt-8 p-6 bg-white shadow-md rounded-md self-start">
        <h1 class="text-xl mb-4">Welcome to Couriers manager!</h1>
        @guest
            <h2>You can use all functionality, only if you Log in.</h2>
        @endguest
        @auth
            <h2> Hi {{ Auth::user()->name }}!</h2>
        @endauth
    </div>
@endsection
