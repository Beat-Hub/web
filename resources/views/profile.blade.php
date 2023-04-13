@extends('layouts.app')
@section('body')
    @section('content')
    <section class=" body-font">
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
    <section class="text-red-500">
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
                            <a onclick="openModal()" class="text-red-600 cursor-pointer" >Click here</a>
                            <svg class="h-8 w-8 text-red-600 ml-auto"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 17a5 5 0 01-.916-9.916 5.002 5.002 0 019.832 0A5.002 5.002 0 0116 17m-7-5l3-3m0 0l3 3m-3-3v12"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap -m-2">
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-red-800 border p-4 rounded-lg">
                        <img alt="team" class="w-16 h-16 bg-red-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/80x80">
                        <div class="flex-grow">
                            <h2 class="text-white title-font font-medium">Beat 1</h2>
                            <p class="text-red-600">Trap</p>
                            <div class="flex justify-end">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="h-8 w-8 ml-auto inline-block ml-auto text-white transition-all duration-500 hover:text-red-600 cursor-pointer">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                                </svg>
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
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-red-800 border p-4 rounded-lg">
                        <img alt="team" class="w-16 h-16 bg-red-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/84x84">
                        <div class="flex-grow">
                            <h2 class="text-white title-font font-medium">Beat 2</h2>
                            <p class="text-red-600">Pop</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-red-800 border p-4 rounded-lg">
                        <img alt="team" class="w-16 h-16 bg-red-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/88x88">
                        <div class="flex-grow">
                            <h2 class="text-white title-font font-medium">Beat 3</h2>
                            <p class="text-red-600">azertyr</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-red-800 border p-4 rounded-lg">
                        <img alt="team" class="w-16 h-16 bg-red-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/90x90">
                        <div class="flex-grow">
                            <h2 class="text-white title-font font-medium">Beat 4</h2>
                            <p class="text-red-600">Deazeazes</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-red-800 border p-4 rounded-lg">
                        <img alt="team" class="w-16 h-16 bg-red-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/94x94">
                        <div class="flex-grow">
                            <h2 class="text-white title-font font-medium">Beat 5</h2>
                            <p class="text-red-600">sdqdsq</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-red-800 border p-4 rounded-lg">
                        <img alt="team" class="w-16 h-16 bg-red-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/98x98">
                        <div class="flex-grow">
                            <h2 class="text-white title-font font-medium">beat 6 </h2>
                            <p class="text-red-600">sdqdsqdqr</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-red-800 border p-4 rounded-lg">
                        <img alt="team" class="w-16 h-16 bg-red-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/108x98">
                        <div class="flex-grow">
                            <h2 class="text-white title-font font-medium">Beat 7</h2>
                            <p class="text-red-600">Pqsdqsdr</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .animated {
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        .animated.faster {
            -webkit-animation-duration: 500ms;
            animation-duration: 500ms;
        }

        .fadeIn {
            -webkit-animation-name: fadeIn;
            animation-name: fadeIn;
        }

        .fadeOut {
            -webkit-animation-name: fadeOut;
            animation-name: fadeOut;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }
    </style>
    <div class="main-modal modal-container xl fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
         style="background: rgba(0,0,0,.7);">
        <div class="border border-red-600 modal-container xl bg-black w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Upload your Beat</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                             viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>
                <!--Body-->
                <div class="flex flex-wrap -m-2">
                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-white">Beat name</label>
                            <input type="text" id="title" name="title" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="message" class="leading-7 text-sm text-white>">Description</label>
                            <textarea id="description" name="description" class="w-full bg-white bg-opacity-5 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                        </div>
                    </div>
                <!--Footer-->
                <div class="flex justify-end pt-2">
                    <button
                        class="focus:outline-none modal-close px-4 bg-white p-3 rounded-lg text-black hover:bg-red-200">Cancel</button>
                    <button
                        class="focus:outline-none px-4 bg-red-600 p-3 ml-3 rounded-lg text-white hover:bg-red-500">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const modal = document.querySelector('.main-modal');
        const closeButton = document.querySelectorAll('.modal-close');

        const modalClose = () => {
            modal.classList.remove('fadeIn');
            modal.classList.add('fadeOut');
            setTimeout(() => {
                modal.style.display = 'none';
            }, 500);
        }

        const openModal = () => {
            modal.classList.remove('fadeOut');
            modal.classList.add('fadeIn');
            modal.style.display = 'flex';
        }

        for (let i = 0; i < closeButton.length; i++) {

            const elements = closeButton[i];

            elements.onclick = (e) => modalClose();

            modal.style.display = 'none';

            window.onclick = function (event) {
                if (event.target == modal) modalClose();
            }
        }
    </script>
    @endsection
@include('footer')
@endsection
