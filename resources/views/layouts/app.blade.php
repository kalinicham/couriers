<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body >
    <header class="w-full max-w-[90%] text-sm mb-6 mt-6 mx-auto ">
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="button-navigation">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="button-navigation">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="button-navigation">Register</a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>
    <div class="w-full">
        @yield('content')
    </div>
</body>
</html>
