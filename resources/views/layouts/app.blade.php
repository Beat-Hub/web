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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /><body>
    <header class="bg-white bg-opacity-5 border-b-2 border-opacity-10 border-white p-6 w-full inline-flex justify-between items-center">
            <div class="logo text-3xl mx-8">Beat<span class="logo-contrast">Hub</span></div>
        @if(Auth::user())
            <div>
                {{-- <a href="{{ route('upload') }}">--}}
                    <button class="px-6 py-2 font-bold hover:text-red-600">Upload</button>
                {{--</a>--}}
               <a href="{{ route('profile') }}">
                    <button class="px-6 py-2 font-bold rounded-md text-red-500 text-red-600 hover:text-white">My Profile</button>
               </a>
                {{--<a href="{{ route('cart') }}">--}}
                <i class="px-6 py-2 fa-solid fa-cart-shopping border-1 cursor-pointer hover:text-red-600"></i>
                {{-- </a> --}}
            </div>
            <div class="relative hidden md:block">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-red-600" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="search-navbar" class="block w-full p-2 pl-10 text-sm text-red-600 border-2 border-red-500 rounded-lg focus:border-red-600 dark:bg-black dark:border-black dark:placeholder-red-600 dark:text-white dark:focus:ring-red-600 dark:focus:border-red-600" placeholder="Search..."></input>
            </div>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <button class="px-6 py-2 bg-red-600 font-bold rounded-md">Logout</button>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                @method('POST')
            </form>
        @else
            <div>
                {{--<a href="{{ route('open_for_business') }}">--}}
                <button class="px-2 text-sm font-bold hover:text-red-600 py-2 ">Open for business</button>
                {{-- </a> --}}
               {{--<a href="{{ route('cart') }}">--}}
                <i class="px-2 fa-solid fa-cart-shopping border-1 cursor-pointer hover:text-red-600"></i>
                {{-- </a> --}}
            </div>
        <div>
            <a href="{{ route('login') }}">
                <button class="px-6 py-2 bg-red-600 font-bold rounded-md">Login</button>
            </a>
            <a href="{{ route('register') }}">
                <button class="px-6 py-2 font-bold">Register</button>
            </a>
        </div>
        @endif
    </header>
        <div class="p-10">
            @yield('content')
        </div>
        <div>
            @yield('footer')
        </div>

</body>
</html>
