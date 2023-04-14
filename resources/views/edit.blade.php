@extends('layouts.app')
@section('content')
    <div class="p-8 -mt-10">
        <div class="p-8 shadow mt-24 ">
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-3">
                    <div class="grid grid-cols-3 text-center order-last md:order-first mt-20 md:mt-0">
                        <div>
                            <p class="font-bold text-red-700 text-xl">22</p>
                            <p class="text-red-400">Downloads</p>
                        </div>
                        <div>
                            <p class="font-bold text-red-700 text-xl">10</p>
                            <p class="text-red-400">Listeners</p>
                        </div>
                        <div>
                            <p class="font-bold text-red-700 text-xl">89</p>
                            <p class="text-red-400">Files</p>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="w-48 h-48 bg-red-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-red-500">
                            <img src="{{ Storage::url('images/' . auth()->user()->photo) }}" alt="Foto de perfil" class="w-24 h-24 rounded-full">
                            <button class="absolute bottom-0 right-0 -left-2 text-black font-bold text-sm py-4 px-4 border border-black rounded hover:text-red-500" onclick="document.getElementById('photo').click()">Change picture</button>
                            <input id="photo" type="file" name="avatar" style="display:none">
                        </div>
                    </div>
                </div>
                <div class="mt-20 text-center border-b pb-12">
                    <h1 class="text-4xl font-medium text-red-700">{{ $user->name }}</h1>
                    <input type="text" class="border-l-2 bg-white bg-opacity-5 border-red-600 pl-2 font-light text-red-600 mt-3 p-1" value="{{ $user->age }}" onclick="this.select()" placeholder="AGE" />
                    <input type="text" class="border-l-2 bg-white bg-opacity-5 border-red-600 pl-2 font-light text-red-600 mt-3 p-1" value="{{ $user->city }}" onclick="this.select()" placeholder="CITY"/>
                    <input type="text" class="border-l-2 bg-white bg-opacity-5 border-red-600 pl-2 font-light text-red-600 mt-3 p-1" value="{{ $user->school }}" onclick="this.select()" placeholder="University of nanash" />
                </div>
                <div class="mt-12 flex flex-col justify-center">
                    <p class="text-red-600 text-center font-light lg:px-16">Greetings, my name is Rachid and I am a seasoned beatmaker with a passion for producing top-notch tracks. With 5 years of experience using FL Studio, I specialize in creating beats in a variety of genres including trap, pop, and rock.</p>
                    <button  class="text-red-300 hover:text-red-500 underline py-2 px-4  font-medium mt-4">  Show more</button>
                </div>
                <div class=" p-14 space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center">
                    <button type="submit" name="submit" class="text-white py-2 px-4 uppercase rounded bg-red-600 hover:bg-red-500 shadow hover:shadow-lg font-medium"> Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
