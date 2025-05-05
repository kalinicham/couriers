<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen">
<header class="w-full max-w-[90%] text-sm mb-6 mt-6 mx-auto">
    @yield('header')
</header>
<hr class="w-full border-t-2 border-gray-300">
<div class="w-full flex-grow flex">
    @yield('content')
</div>
<footer class="bg-gray-800 text-white py-4 text-center">
    <p>&copy; {{ date('Y') }} Сouriers ( test )</p>
</footer>
@stack('scripts')
</body>
</html>
