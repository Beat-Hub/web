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
                        <div class="lg:w-1/4 md:w-1/2 p-4 w-full relative">
                            <div class="block relative h-48 rounded overflow-hidden">
                                <img alt="{{ $beat->beat_name }}" class="object-cover object-center w-full h-full block" src="/storage/images/{{ $beat->user->image }}">
                                <button class="btn-like absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-full shadow-lg p-3" data-beat-id="{{ $beat->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M8 5v10l6-5z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="relative">
                                <div class="pt-4">
                                    <h3 class="text-red-500 uppercase text-xs tracking-widest title-font mb-1">{{ $beat->genre  }}</h3>
                                    <h2 class="text-red-900 title-font capitalize text-lg font-medium">{{ $beat->beat_name }} by {{ $beat->user->name }}</h2>
                                    @if(isset($beat->mp3_file))
                                        <audio controls src="{{ asset('storage/mp3_files/' . $beat->mp3_file) }}"></audio>
                                        {{ $beat->price_mp3 }} €
                                    @elseif(isset($beat->wav_file))
                                        {{ $beat->price_wav }} €
                                    @endif
                                </div>
                                <button class="absolute top-2 right-0 focus:outline-none text-red-500 btn-like" data-like-url="{{ route('beats.like', $beat->id) }}" data-beat-id="{{ $beat->id }}">
                                    <i class="like-heart fa-regular fa-heart @if($beat->hasUserLiked(auth()->user())) fa-solid @endif" style="color: #fd0808;" data-beat-id="{{ $beat->id }}"></i>
                                    <h5 class="like-counter" data-beat-id="{{ $beat->id }}">{{ $beat->likes()->count() }}</h5>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="fixed bottom-0 left-0 z-50 grid w-full h-24 grid-cols-1 px-8 bg-white border-t border-red-200 md:grid-cols-3 dark:bg-black dark:border-red-600">
            <div class="items-center justify-center hidden mr-auto text-red-500 dark:text-red-400 md:flex">
                <img class="h-8 mr-3 rounded" src=" {{ asset('storage/mp3_files/' . $beat->user->image) }}" alt="{{ $beat->beat_name }}">
                <span class="text-sm">{{$beat->beat_name}}</span>
            </div>
            <div class="flex items-center w-full">
                <div class="w-full">
                    <div class="flex items-center justify-center mx-auto mb-1">
                        <button data-tooltip-target="tooltip-shuffle" type="button" class="p-2.5 group rounded-full hover:bg-red-100 mr-1 focus:outline-none focus:ring-4 focus:ring-red-200 dark:focus:ring-red-600 dark:hover:bg-red-600">
                            <svg class="w-5 h-5 text-red-500 dark:text-red-300 group-hover:text-red-900 dark:group-hover:text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" aria-hidden="true"><path d="M403.8 34.4c12-5 25.7-2.2 34.9 6.9l64 64c6 6 9.4 14.1 9.4 22.6s-3.4 16.6-9.4 22.6l-64 64c-9.2 9.2-22.9 11.9-34.9 6.9s-19.8-16.6-19.8-29.6V160H352c-10.1 0-19.6 4.7-25.6 12.8L284 229.3 244 176l31.2-41.6C293.3 110.2 321.8 96 352 96h32V64c0-12.9 7.8-24.6 19.8-29.6zM164 282.7L204 336l-31.2 41.6C154.7 401.8 126.2 416 96 416H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H96c10.1 0 19.6-4.7 25.6-12.8L164 282.7zm274.6 188c-9.2 9.2-22.9 11.9-34.9 6.9s-19.8-16.6-19.8-29.6V416H352c-30.2 0-58.7-14.2-76.8-38.4L121.6 172.8c-6-8.1-15.5-12.8-25.6-12.8H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H96c30.2 0 58.7 14.2 76.8 38.4L326.4 339.2c6 8.1 15.5 12.8 25.6 12.8h32V320c0-12.9 7.8-24.6 19.8-29.6s25.7-2.2 34.9 6.9l64 64c6 6 9.4 14.1 9.4 22.6s-3.4 16.6-9.4 22.6l-64 64z" fill="currentColor"/></svg>
                            <span class="sr-only">Shuffle beat</span>
                        </button>
                        <div id="tooltip-shuffle" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-red-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-red-700">
                            Shuffle beat
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <button data-tooltip-target="tooltip-previous" type="button" class="p-2.5 group rounded-full hover:bg-red-100 focus:outline-none focus:ring-4 focus:ring-red-200 dark:focus:ring-red-600 dark:hover:bg-red-600">
                            <svg class="w-5 h-5 text-red-500 dark:text-red-300 group-hover:text-red-900 dark:group-hover:text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" aria-hidden="true"><path d="M267.5 440.6c9.5 7.9 22.8 9.7 34.1 4.4s18.4-16.6 18.4-29V96c0-12.4-7.2-23.7-18.4-29s-24.5-3.6-34.1 4.4l-192 160L64 241V96c0-17.7-14.3-32-32-32S0 78.3 0 96V416c0 17.7 14.3 32 32 32s32-14.3 32-32V271l11.5 9.6 192 160z" fill="currentColor" /></svg>
                            <span class="sr-only">Previous beat</span>
                        </button>
                        <div id="tooltip-previous" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-red-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-red-700">
                            Previous beat
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <button data-tooltip-target="tooltip-pause" type="button" class="inline-flex items-center justify-center p-2.5 mx-2 font-medium bg-red-900 rounded-full hover:bg-red-00 group focus:ring-4 focus:ring-red-300 focus:outline-none dark:focus:ring-red-800">
                            <svg class="w-4 h-4 text-white" viewBox="0 0 10 14" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.625 1.375C0.625 1.02982 0.904823 0.75 1.25 0.75H2.5C2.84518 0.75 3.125 1.02982 3.125 1.375V12.625C3.125 12.9702 2.84518 13.25 2.5 13.25H1.25C1.08424 13.25 0.925268 13.1842 0.808058 13.0669C0.690848 12.9497 0.625 12.7908 0.625 12.625L0.625 1.375ZM6.875 1.375C6.875 1.02982 7.15482 0.75 7.5 0.75H8.75C8.91576 0.75 9.07473 0.815848 9.19194 0.933058C9.30915 1.05027 9.375 1.20924 9.375 1.375L9.375 12.625C9.375 12.9702 9.09518 13.25 8.75 13.25H7.5C7.15482 13.25 6.875 12.9702 6.875 12.625V1.375Z" fill="currentColor" />
                            </svg>
                            <span class="sr-only">Pause beat</span>
                        </button>
                        <div id="tooltip-pause" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-red-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-red-700">
                            Pause beat
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <button data-tooltip-target="tooltip-next" type="button" class="p-2.5 group rounded-full hover:bg-red-100 mr-1 focus:outline-none focus:ring-4 focus:ring-red-200 dark:focus:ring-red-600 dark:hover:bg-red-600">
                            <svg class="w-5 h-5 text-red-500 dark:text-red-300 group-hover:text-red-900 dark:group-hover:text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" aria-hidden="true"><path d="M52.5 440.6c-9.5 7.9-22.8 9.7-34.1 4.4S0 428.4 0 416V96C0 83.6 7.2 72.3 18.4 67s24.5-3.6 34.1 4.4l192 160L256 241V96c0-17.7 14.3-32 32-32s32 14.3 32 32V416c0 17.7-14.3 32-32 32s-32-14.3-32-32V271l-11.5 9.6-192 160z" fill="currentColor" /></svg>
                            <span class="sr-only">Next beat</span>
                        </button>
                        <div id="tooltip-next" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-red-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-red-700">
                            Next beat
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <button data-tooltip-target="tooltip-restart" type="button" class="p-2.5 group rounded-full hover:bg-red-100 mr-1 focus:outline-none focus:ring-4 focus:ring-red-200 dark:focus:ring-red-600 dark:hover:bg-red-600">
                            <svg class="w-5 h-5 text-red-500 dark:text-red-300 group-hover:text-red-900 dark:group-hover:text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" aria-hidden="true"><path d="M0 224c0 17.7 14.3 32 32 32s32-14.3 32-32c0-53 43-96 96-96H320v32c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l64-64c12.5-12.5 12.5-32.8 0-45.3l-64-64c-9.2-9.2-22.9-11.9-34.9-6.9S320 19.1 320 32V64H160C71.6 64 0 135.6 0 224zm512 64c0-17.7-14.3-32-32-32s-32 14.3-32 32c0 53-43 96-96 96H192V352c0-12.9-7.8-24.6-19.8-29.6s-25.7-2.2-34.9 6.9l-64 64c-12.5 12.5-12.5 32.8 0 45.3l64 64c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6V448H352c88.4 0 160-71.6 160-160z" fill="currentColor" /></svg>
                            <span class="sr-only">Restart beat</span>
                        </button>
                        <div id="tooltip-restart" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-red-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-red-700">
                            Restart beat
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between space-x-2">
                        <span class="text-sm font-medium text-red-500 dark:text-red-400">3:45</span>
                        <div class="w-full bg-red-200 rounded-full h-1.5 dark:bg-red-800">
                            <div class="bg-red-600 h-1.5 rounded-full" style="width: 65%"></div>
                        </div>
                        <span class="text-sm font-medium text-red-500 dark:text-red-400">5:00</span>
                    </div>
                </div>
            </div>
            <div class="items-center justify-center hidden ml-auto md:flex">
                <button data-tooltip-target="tooltip-volume" type="button" class="p-2.5 group rounded-full hover:bg-red-100 focus:outline-none focus:ring-4 focus:ring-red-200 dark:focus:ring-red-600 dark:hover:bg-red-600">
                    <svg class="w-5 h-5 text-red-500 dark:text-red-300 group-hover:text-red-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM14.657 2.929a1 1 0 011.414 0A9.972 9.972 0 0119 10a9.972 9.972 0 01-2.929 7.071 1 1 0 01-1.414-1.414A7.971 7.971 0 0017 10c0-2.21-.894-4.208-2.343-5.657a1 1 0 010-1.414zm-2.829 2.828a1 1 0 011.415 0A5.983 5.983 0 0115 10a5.984 5.984 0 01-1.757 4.243 1 1 0 01-1.415-1.415A3.984 3.984 0 0013 10a3.983 3.983 0 00-1.172-2.828 1 1 0 010-1.415z"></path>
                    </svg>
                    <span class="sr-only">Adjust volume</span>
                </button>
                <div id="tooltip-volume" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-red-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-red-700">
                    Adjust volume
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/likeSystem.js') }}"></script>
    @endsection
    @include('footer')
@endsection

