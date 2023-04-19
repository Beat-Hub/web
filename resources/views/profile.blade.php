@extends('layouts.app')
@section('body')
    @section('content')
        @if (session('success'))
            <div id="success-message" class="bg-red-500 text-white font-bold px-2 py-2 mb-6 rounded-md flex items-center">
                <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                </svg>
                <span>{{ session('success') }}</span>
                <button id="close-message" class="ml-auto text-white rounded-full bg-red-500 p-2">x
                    <svg class="h-5 w-5 fill-current" viewBox="0 0 20 20">
                        <path d="M6.4,6.4 L13.6,13.6 M6.4,13.6 L13.6,6.4" />
                    </svg>
                </button>
            </div>
        @endif
        <header class="text-red-600 body-font">
            <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
                <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
                    <a href="{{ route('edit') }}" class="mr-5 -mt-10 hover:text-red-500 cursor-pointer hover:underline">Edit</a>
                    <a href="#yourBeats" class="mr-5 -mt-10 hover:text-red-500 cursor-pointer hover:underline">Check your Beats</a>
                </nav>
            </div>
        </header>
    <section class="body-font">
      <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-20">
          <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">Beat Analytics: Keep Track of Your Performance on Your Profile</h1>
          <p class="lg:w-2/3 mx-auto text-red-500 leading-relaxed text-base">Track the performance of your beats by monitoring the number of plays, downloads, and uploads on your profile.</p>
        </div>
        <div class="flex flex-wrap -m-4 text-center">
          <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
            <div class="border-2 border-red-600 px-4 py-6 rounded-lg">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-white w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                <path d="M8 17l4 4 4-4m-4-5v9"></path>
                <path d="M20.88 18.09A5 5 0 0018 9h-1.26A8 8 0 103 16.29"></path>
              </svg>
              <h2 class="title-font font-medium text-3xl text-white>">2.7K</h2>
              <p class="leading-relaxed">Downloads</p>
            </div>
          </div>
          <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
            <div class="border-2 border-red-600 px-4 py-6 rounded-lg">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-white w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                <circle cx="9" cy="7" r="4"></circle>
                <path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75"></path>
              </svg>
              <h2 class="title-font font-medium text-3xl">1.3K</h2>
              <p class="leading-relaxed">Users</p>
            </div>
          </div>
          <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
            <div class="border-2 border-red-600 px-4 py-6 rounded-lg">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-white w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                <path d="M3 18v-6a9 9 0 0118 0v6"></path>
                <path d="M21 19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-3a2 2 0 012-2h3zM3 19a2 2 0 002 2h1a2 2 0 002-2v-3a2 2 0 00-2-2H3z"></path>
              </svg>
              <h2 class="title-font font-medium text-3xl text-white">74</h2>
              <p class="leading-relaxed">Files</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="yourBeats" class="text-red-500">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">Your Beats</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Manage Your Beats: Upload, Edit, or Delete Your Audio Creations</p>
            </div>
            <div class="flex flex-wrap -m-2 text-center">
                <div class="p-2 mb-10 w-full">
                    <div class="h-full flex items-center border-red-800 border p-4 rounded-lg">
                        <div class="flex-grow">
                            <h2 class="text-white title-font font-medium mb-8 text-xl">Upload a Beat</h2>
                            <a href="{{ route('upload_beat') }}" class="text-red-600 cursor-pointer" >Click here</a>
                            <svg class="h-8 w-8 text-red-600 ml-auto"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 17a5 5 0 01-.916-9.916 5.002 5.002 0 019.832 0A5.002 5.002 0 0116 17m-7-5l3-3m0 0l3 3m-3-3v12"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap -m-2">
                @if (isset($beats) && count($beats) > 0)
                    @foreach ($beats as $beat)
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-red-800 border p-4 rounded-lg">
                        <img alt="team" class="w-16 h-16 bg-red-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="/images/{{ $beat->user->image }}">
                        <div class="flex-grow">
                            <h2 class="text-white title-font capitalize font-medium">{{ $beat->beat_name }}</h2>
                            <p class="text-red-600 capitalize">{{ $beat->genre}}</p>
                            <p class="text-red-600 capitalize">{{ $beat->bpm}} BPM</p>
                            <div class="flex justify-end">
                                <a href="{{ route('edit_beat', ['id' => $beat->id]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="h-8 w-8 ml-auto inline-block  text-white transition-all duration-500 hover:text-red-600 cursor-pointer">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                                    </svg>
                                </a>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="h-8 w-8 inline-block text-white transition-all duration-500 hover:text-red-600 cursor-pointer">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M9 12.75l3 3m0 0l3-3m-3 3v-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                    <h3>You don't have any beats yet.</h3>
                @endif
            </div>
        </div>
    </section>
        <script src="{{ asset('js/closeAlert.js') }}"></script>

    @endsection
@include('footer')
@endsection
