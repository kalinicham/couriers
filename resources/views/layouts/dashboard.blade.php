@extends('layouts.app')

@section('header')
    <nav class="flex items-center justify-end gap-4">
        <x-nav-link href="{{ url('/dashboard') }}">Dashboard</x-nav-link>
        <form method="POST" action="/logout">
            @csrf
            <x-submit-button class="px-4">Log out</x-submit-button>
        </form>
    </nav>
@endsection
@section('content')
    <div class="flex flex-grow">
        <div class="w-1/4 pr-4 max-w-[250px] bg-gray-100 h-full">
            <div class="p-4">
                <ul class="space-y-2 text-sm">
                    <x-dashboard.menu-link href="{{ route('couriers.index') }}">Couriers</x-dashboard.menu-link>
                    <x-dashboard.menu-link href="{{ route('map') }}">Map</x-dashboard.menu-link>
                    <x-dashboard.menu-link href="#">Debug</x-dashboard.menu-link>
                </ul>
            </div>
        </div>
        <div class="w-3/4 bg-white p-6 flex flex-col justify-center items-start h-full">
            @if(isset($actions) && $actions === true)
                <div class="mb-4 flex justify-end gap-2 w-full">
                    @yield('actions')
                </div>
            @endif
            <x-flash-message />
            @isset($title)
                <div class="mb-4 w-full">
                    <h2 class="text-xl font-semibold">{{ $title }}</h2>
                </div>
            @endisset
            <div class="flex-grow w-full">
                @yield('main')
            </div>
        </div>
    </div>
@endsection
