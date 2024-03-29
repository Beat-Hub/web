@extends('layouts.app')
@section('content')
    <div class="p-8 -mt-10">
        <div class="p-8 shadow mt-24 ">
            <form id="update-form" action="{{ route('update_profile', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="hidden" name="id" value="{{ $user->id }}">
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
                            <p class="font-bold text-red-700 text-xl">{{$mp3_wav_count}}</p>
                            <p class="text-red-400">Files</p>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="w-48 h-48 bg-red-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-red-500">
                            <img id="profile-image" src="/storage/images/{{$user->image}}" alt="{{$user->name}}" class="w-full h-full object-cover rounded-full">
                            <button type="button" class="absolute bottom-0 right-0 -left-2 text-black font-bold text-sm py-4 px-4 border border-black hover:bg-black rounded hover:text-red-500" onclick="document.getElementById('imageName').click()">Change picture</button>
                            <input id="imageName" type="file" name="image" style="display:none" onchange="handleImageChange(event)">
                        </div>
                    </div>
                </div>
                <div class="mt-20 text-center border-b pb-12">
                    <h1 class="text-4xl font-medium text-red-700">{{ $user->name }}</h1>
                    <label for="email" class="leading-7 text-sm text-white">Email</label>
                    <input type="email" class="border-l-2 bg-white bg-opacity-5 border-red-600 pl-2 font-light text-red-600 mt-3 p-1" value="{{ $user->email }}" placeholder="example@gmail.com" name="email"/>
                    <label for="age" class="leading-7 text-sm text-white">Age</label>
                    <input type="number" class="border-l-2 bg-white bg-opacity-5 border-red-600 pl-2 font-light text-red-600 mt-3 p-1" value="{{ $user->age }}" placeholder="AGE" name="age"/>
                    <label for="text" class="leading-7 text-sm text-white">City</label>
                    <input type="text" class="border-l-2 bg-white bg-opacity-5 border-red-600 pl-2 font-light text-red-600 mt-3 p-1" value="{{ $user->city }}" placeholder="CITY" name="city"/>
                    <label for="text" class="leading-7 text-sm text-white">School</label>
                    <input type="text" class="border-l-2 bg-white bg-opacity-5 border-red-600 pl-2 font-light text-red-600 mt-3 p-1" value="{{ $user->school }}" placeholder="University of nanash" name="school"/>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="mt-12 flex flex-col justify-center">
                    <p class="text-red-300 hover:text-red-500 text-center py-2 px-4  font-medium -mt-4 mb-4">  Description</p>
                    <input class=" border-l-2 bg-white text-center bg-opacity-5 border-red-600 text-red-600 font-light lg:px-16" value="{{ $user->description }}" name="description" onkeyup="countWords(this)"  />
                </div>
                <div class=" p-14 space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center">
                    <button type="submit" name="submit" class="text-white py-2 px-4 uppercase rounded bg-red-600 hover:bg-red-500 shadow hover:shadow-lg font-medium"> Save</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/editProfile.js') }}"></script>
@endsection
