@extends('layouts.app')

@section('body')

    @section('content')
        <div class="p-6">
            <h1 class="text-4xl font-bold mb-6">Find your perfect beat, created by the community!</h1>
        </div>
        <section class="text-red-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap -m-4">
                    @foreach ($beats as $beat)
                        <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                            <a class="block relative h-48 rounded overflow-hidden">
                                <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://dummyimage.com/420x260">
                            </a>
                            <div class="mt-4">
                                <h3 class="text-red-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                                <h2 class="text-red-900 title-font text-lg font-medium"></h2>
                                <p class="mt-1">$16.00</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endsection

    @include('footer')
@endsection
