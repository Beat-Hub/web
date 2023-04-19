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
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">Beat Uploader</h1>
                <h2 class="text-xs text-red-400 tracking-widest font-medium title-font mb-1">Enter beat information</h2>
            </div>
        </div>
        <form id="update-form" action="{{ route('add_beat') }}" method="POST" enctype="multipart/form-data">
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
                <div style="display: flex; flex-direction: column;">
                    <label for="Beat Name" class="leading-7 text-sm text-white text-center">Beat Name</label>
                    <input type="text" class="border-l-2 bg-white bg-opacity-10 border-red-600 pl-2 font-light text-red-600 mt-3 p-1  mb-5" value="" placeholder="Murcia" name="beat_name"/>
                </div>
                <div class="text-center border-b pb-12" style="display: flex;">
                    <div style="width: 50%;">
                        <div style="display: flex; flex-direction: column;">
                            <label for="bpm" class="leading-7 text-sm text-white mr-8">BPM</label>
                            <input type="number" class="border-l-2 bg-white bg-opacity-10 border-red-600 pl-2 font-light text-red-600 mt-3 p-1 mr-8 mb-5" value="" onclick="this.select()" placeholder="125" name="bpm"/>
                        </div>
                    </div>
                    <div style="width: 50%;">
                        <div style="display: flex; flex-direction: column;">
                            <label for="text" class="leading-7 text-sm text-white ml-8">Genre</label>
                            <select type="text" class="border-l-2 bg-white bg-opacity-10 border-red-600 pl-2 font-light text-red-600 mt-3 p-1 ml-8" name="genre">
                                <option selected class="bg-black text-red-600">Genre</option>
                                <option value="hiphop" class="bg-black text-red-600">Hip Hop</option>
                                <option value="pop" class="bg-black text-red-600">Pop</option>
                                <option value="rock" class="bg-black text-red-600">Rock</option>
                                <option value="classic" class="bg-black text-red-600">Classic</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3 text-center">
                    <label for="beatFileMP3" class="mb-2 inline-block text-white mt-5 text-center">Upload your MP3 file</label>
                    <div class="flex items-center">
                        <input id="link-checkboxMP3" type="checkbox" value="" class="w-4 h-4 mr-16 -mt-1 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="price_mp3" class="leading-7 text-sm -mt-1 text-white mr-8">Price</label>
                        <input type="number" name="price_mp3" step="any" class="border-l-2 bg-white bg-opacity-10 border-red-600 pl-2 font-light text-red-600 mt-3 p-1 mr-8 mb-5" value="" onclick="this.select()" placeholder="29.99" id="beatPriceMP3" disabled/>
                        <input class="relative -mt-2 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary" type="file" name="mp3_file" id="beatFileMP3" disabled />
                    </div>
                    <h2 class="text-xs mt-1 text-red-400 tracking-widest font-medium title-font mb-1">Pick the MP3 file you want and upload it.</h2>
                </div>
                <div class="mb-3 text-center">
                    <label for="beatFileWAV" class="mb-2 inline-block text-white mt-5 text-center">Upload your WAV file</label>
                    <div class="flex items-center">
                        <input id="link-checkboxWAV" type="checkbox" value="" class="w-4 h-4 mr-16 -mt-1 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="email" class="leading-7 text-sm -mt-1 text-white mr-8">Price</label>
                        <input type="number" name="price_wav"  step="any" class="border-l-2 bg-white bg-opacity-10 border-red-600 pl-2 font-light text-red-600 mt-3 p-1 mr-8 mb-5" value="" onclick="this.select()" placeholder="39.99" id="beatPriceWAV" disabled/>
                        <input class="relative -mt-2 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary" type="file" name="wav_file" id="beatFileWAV" disabled />
                    </div>
                    <h2 class="text-xs mt-1 text-red-400 tracking-widest font-medium title-font mb-1">Pick the WAV file you want and upload it.</h2>
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
        const beatFileMP3Input = document.getElementById('beatFileMP3');
        const linkCheckboxWAV = document.getElementById('link-checkboxWAV');
        const beatPriceWAVInput = document.getElementById('beatPriceWAV')
        const beatFileWAVInput = document.getElementById('beatFileWAV');

        beatFileMP3Input.disabled = true;
        beatFileWAVInput.disabled = true;

        linkCheckboxMP3.addEventListener('change', () => {
            beatPriceMP3Input.disabled = !linkCheckboxMP3.checked;
            beatFileMP3Input.disabled = !linkCheckboxMP3.checked;
        });

        linkCheckboxWAV.addEventListener('change', () => {
            beatPriceWAVInput.disabled = !linkCheckboxWAV.checked;
            beatFileWAVInput.disabled = !linkCheckboxWAV.checked;
        });
    </script>
    <script src="{{ asset('js/closeAlert.js') }}"></script>
@endsection
