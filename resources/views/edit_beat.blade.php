@extends('layouts.app')

@section('content')
    <section class="text-red-400 body-font">
        <div class="container px-44 py-4  mx-auto">
            <div class="flex flex-col text-base w-full mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">Beat Editor</h1>
                <h2 class="text-xs text-red-400 tracking-widest font-medium title-font mb-1">Enter beat information</h2>
            </div>
        </div>
        <form id="update-form" action="{{ route('update_beat', ['id' => $beat->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="container px-44 -mt-10 mx-auto">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div style="display: flex; flex-direction: column;">
                    <label for="Beat Name" class="leading-7 text-sm text-white text-center">Beat Name</label>
                    <input type="text" class="border-l-2 bg-white bg-opacity-10 border-red-600 pl-2 font-light text-red-600 mt-3 p-1 capitalize mb-5" value="{{ $beat->beat_name }}" placeholder="Murcia" name="beat_name"/>
                </div>
                <div class="text-center border-b pb-12" style="display: flex;">
                    <div style="width: 50%;">
                        <div style="display: flex; flex-direction: column;">
                            <label for="bpm" class="leading-7 text-sm text-white mr-8">BPM</label>
                            <input type="number" value="{{ $beat->bpm }}" class="border-l-2 bg-white bg-opacity-10 border-red-600 pl-2 font-light text-red-600 mt-3 p-1 mr-8 mb-5" onclick="this.select()" placeholder="125" name="bpm"/>
                        </div>
                    </div>
                    <div style="width: 50%;">
                        <div style="display: flex; flex-direction: column;">
                            <label for="text" class="leading-7 text-sm text-white ml-8">Genre</label>
                            <select type="text" class="border-l-2 bg-white bg-opacity-10 border-red-600 pl-2 font-light text-red-600 mt-3 p-1 ml-8" name="genre">
                                <option value="hiphop" class="bg-black text-red-600" {{ $beat->genre == 'hiphop' ? 'selected' : '' }}>Hip Hop</option>
                                <option value="pop" class="bg-black text-red-600" {{ $beat->genre == 'pop' ? 'selected' : '' }}>Pop</option>
                                <option value="rock" class="bg-black text-red-600" {{ $beat->genre == 'rock' ? 'selected' : '' }}>Rock</option>
                                <option value="classic" class="bg-black text-red-600" {{ $beat->genre == 'classic' ? 'selected' : '' }}>Classic</option>
                            </select>

                        </div>
                    </div>
                </div>
                    <div class="flex">
                        <div class="mb-3 text-center mr-auto">
                            <label for="beatFileMP3" class="mb-2 inline-block text-white mt-5 text-center">MP3 PRICE</label>
                            <div class="flex items-center">
                                <input id="link-checkboxMP3" type="checkbox" value="" class="w-4 h-4 mr-16 -mt-1 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="price_mp3" class="leading-7 text-sm -mt-1 text-white mr-8">Price</label>
                                <input type="number" name="price_mp3" step="any" class="border-l-2 bg-white bg-opacity-10 border-red-600 pl-2 font-light text-red-600 mt-3 p-1 mr-8 mb-5" value="" onclick="this.select()" placeholder="29.99" id="beatPriceMP3" disabled/>
                            </div>
                        </div>
                        <div class="mb-3 text-center">
                            <label for="beatFileWAV" class="mb-2 inline-block text-white mt-5 text-center">WAV PRICE</label>
                            <div class="flex items-center">
                                <input id="link-checkboxWAV" type="checkbox" value="" class="w-4 h-4 mr-16 -mt-1 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="email" class="leading-7 text-sm -mt-1 text-white mr-8">Price</label>
                                <input type="number" name="price_wav"  step="any" class="border-l-2 bg-white bg-opacity-10 border-red-600 pl-2 font-light text-red-600 mt-3 p-1 mr-8 mb-5" value="" onclick="this.select()" placeholder="39.99" id="beatPriceWAV" disabled/>
                            </div>
                        </div>
                    </div>
                </div>
            <div class=" p-14 space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center">
                <button type="submit" name="submit" class="text-white py-2 px-4 uppercase rounded bg-red-600 hover:bg-red-500 shadow hover:shadow-lg font-medium"> Save</button>
            </div>
        </form>
    </section>
    <script>
        const linkCheckboxMP3 = document.getElementById('link-checkboxMP3');
        const beatPriceMP3Input = document.getElementById('beatPriceMP3')
        const linkCheckboxWAV = document.getElementById('link-checkboxWAV');
        const beatPriceWAVInput = document.getElementById('beatPriceWAV')


        linkCheckboxMP3.addEventListener('change', () => {
            beatPriceMP3Input.disabled = !linkCheckboxMP3.checked;
        });

        linkCheckboxWAV.addEventListener('change', () => {
            beatPriceWAVInput.disabled = !linkCheckboxWAV.checked;
        });
    </script>

@endsection
