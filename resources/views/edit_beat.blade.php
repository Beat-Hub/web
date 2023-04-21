@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div id="success-message" class="bg-red-500 text-white font-bold px-2 py-2 rounded-md flex items-center">
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
    <section class="text-red-400 body-font">
        <div class="container px-44 py-4  mx-auto">
            <div class="flex flex-col text-base w-full mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">Beat Editor</h1>
                <h2 class="text-xs text-red-400 tracking-widest font-medium title-font mb-1">Enter beat information</h2>
                <div class="flex justify-end">
                    <form method="POST" id="delete-form" action="{{ route('delete_beat', $beat->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal" >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="4 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 inline-block text-white transition-all duration-500 hover:text-red-600 cursor-pointer">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="5" y1="7" x2="20" y2="7" />
                                <line x1="10" y1="11" x2="10" y2="17" />
                                <line x1="14" y1="11" x2="14" y2="17" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12m-18 0h16" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                            </svg>
                        </button>
                        <div>
                            <div id="popup-modal" tabindex="-1" class="fixed z-50 hidden inset-0 bg-black bg-opacity-75 flex items-center justify-center">
                                <div class="relative bg-black border-2 border-red-600 rounded-lg shadow-lg w-full max-w-md p-6 ">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="popup-modal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-6 text-center">
                                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this beat?</h3>
                                        <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            Yes, I'm sure
                                        </button>
                                        <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <form method="POST" id="update-form" action="{{ route('update_beat', ['id' => $beat->id]) }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{ $beat->id }}">
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
                    @if(!empty($beat->mp3_file))
                    <div class="flex">
                        <div class="mb-3 text-center mr-auto">
                            <label for="beatFileMP3" class="mb-2 inline-block text-white mt-5 text-center">MP3 PRICE</label>
                            <div class="flex items-center">
                                <input id="link-checkboxMP3" type="checkbox" value="" class="w-4 h-4 mr-16 -mt-1 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="price_mp3" class="leading-7 text-sm -mt-1 text-white mr-8">Price</label>
                                <input type="number" name="price_mp3" step="any" class="border-l-2 bg-white bg-opacity-10 border-red-600 pl-2 font-light text-red-600 mt-3 p-1 mr-8 mb-5" value="{{ $beat->price_mp3 }}"  onclick="this.select()" placeholder="29.99" id="beatPriceMP3" disabled/>
                            </div>
                        </div>
                        @endif
                        @if(!empty($beat->wav_file))
                        <div class="mb-3 text-center">
                            <label for="beatFileWAV" class="mb-2 inline-block text-white mt-5 text-center">WAV PRICE</label>
                            <div class="flex items-center">
                                <input id="link-checkboxWAV" type="checkbox" value="" class="w-4 h-4 mr-16 -mt-1 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="email" class="leading-7 text-sm -mt-1 text-white mr-8">Price</label>
                                <input type="number" name="price_wav"  step="any" class="border-l-2 bg-white bg-opacity-10 border-red-600 pl-2 font-light text-red-600 mt-3 p-1 mr-8 mb-5"  onclick="this.select()" placeholder="39.99" value="{{ $beat->price_wav }}" id="beatPriceWAV" disabled/>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            <div class=" p-14 space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center">
                <button type="submit" name="submit" class="text-white py-2 px-4 uppercase rounded bg-red-600 hover:bg-red-500 shadow hover:shadow-lg font-medium"> Save</button>
            </div>
        </form>
    </section>
<script src="{{ asset('js/checkboxStatus.js') }}"></script>
<script src="{{ asset('js/modalPopup.js') }}"></script>
<script src="{{ asset('js/closeAlert.js') }}"></script>
@endsection
