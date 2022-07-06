<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Upload and share your beats</title>

    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
<body>
    <header class="bg-white bg-opacity-5 border-b-2 border-opacity-10 border-white p-6 w-full inline-flex justify-between items-center">
        <div class="logo text-3xl mx-8">Beat<span class="logo-contrast">Hub</span></div>
        <div>
            <a href="{{ route('login') }}">
                <button class="px-6 py-2 bg-red-600 font-bold rounded-md">Login</button>
            </a>
            <a href="{{ route('register') }}">
                <button class="px-6 py-2 font-bold">Register</button>
            </a>
        </div>
    </header>
    <div class="p-10">
        @yield('content')
    </div>
</body>
</html>
