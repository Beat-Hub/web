@extends('layouts.app')

@section('footer')
    <footer class="text-white-600 body-fonts bg-white bg-opacity-5 border-b-2 border-opacity-10 border-white p-6 w-full items-center">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap md:text-center text-center order-first">
                <div class=" w-full px-4">
                    <h2 class="title-font font-medium text-red-600 tracking-widest text-lg mb-3">BeatHub</h2>
                    <nav class="list-none mb-5">
                        <li>
                            <a class="transition-all duration-500 text-white-600 hover:text-red-500 cursor-pointer">About Us</a>
                        </li>
                        <li>
                            <a class="transition-all duration-500 text-white-600 hover:text-red-500 cursor-pointer">Merch</a>
                        </li>
                        <li>
                            <a class="transition-all duration-500 text-white-600 hover:text-red-500 cursor-pointer ">Forum</a>
                        </li>
                    </nav>
                </div>
            </div>
        </div>
        <div class="">
            <div class="container px-5 py-6 mx-auto flex items-center sm:flex-row flex-col">
                <a class="flex title-font font-medium items-center md:justify-start justify-center text-white">
                    <p class="logo text-3xl mx-8">Beat<span class="logo-contrast">Hub</span></p>
                </a>
                <p class="text-sm text-gray-500 sm:ml-6 sm:mt-0 mt-4">© 2023 Beathub
                </p>
                <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                <a class="text-gray-500">
                  <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5 text-red-600 cursor-pointer" viewBox="0 0 24 24">
                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                  </svg>
                </a>
                <a class="ml-3 text-gray-500">
                  <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5 text-red-600 cursor-pointer" viewBox="0 0 24 24">
                    <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                  </svg>
                </a>
                <a class="ml-3 text-gray-500">
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5 text-red-600 cursor-pointer" viewBox="0 0 24 24">
                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                  </svg>
                </a>
                <a class="ml-3 text-gray-500">
                  <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5 text-red-600 cursor-pointer" viewBox="0 0 24 24">
                    <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                    <circle cx="4" cy="4" r="2" stroke="none"></circle>
                  </svg>
                </a>
                </span>
            </div>
        </div>
    </footer>
@endsection

