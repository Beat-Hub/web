@extends('layouts.app')
@section('content')
<section class="h-screen w-full flex flex-col justify-center items-center bg-[black]">
    <h1 class="text-9xl font-extrabold text-white tracking-widest">500</h1>
    <div class="bg-red-600 px-2 text-sm rounded rotate-12 absolute">
        Id not found.
    </div>
    <button class="mt-5">
        <a class="relative inline-block text-sm font-medium text-red-600 group active:text-red-500 focus:outline-none focus:ring">
        <span class="absolute inset-0 transition-transform translate-x-0.5 translate-y-0.5 bg-red-600 group-hover:translate-y-0 group-hover:translate-x-0"></span>

            <a href="{{ route('profile') }}">
                <button class="p-4 hover:bg-red-600 rounded"> Go Home</button>

            </a>
        </a>
    </button>
</section>
@endsection
