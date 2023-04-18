@extends('layouts.app')

@section('body')

    @section('content')
        <div class="p-6">
            <h1 class="text-4xl font-bold ml-36 mb-6">Find your perfect beat, created by the community!</h1>
        </div>
        <section class="text-red-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap -m-4">
                    @foreach ($beats as $beat)
                        <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                            <a class="block relative h-48 rounded overflow-hidden">
                                @foreach ($users as $user)
                                <img alt="{{ $beat->beat_name }}" class="object-cover object-center w-full h-full block" src="/images/{{ $beat->user->image }}">
                                @endforeach
                            </a>
                            <div class="mt-4">
                                <h3 class="text-red-500 uppercase text-xs tracking-widest title-font mb-1">{{ $beat->genre  }}</h3>
                                <h2 class="text-red-900 title-font capitalize text-lg font-medium">{{ $beat->beat_name }} by {{ $beat->user->name }}</h2>
                                <p class="mt-1">{{ $beat->price_mp3 }} €</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endsection

    @include('footer')
@endsection
