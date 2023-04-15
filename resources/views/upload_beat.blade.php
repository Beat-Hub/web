@extends('layouts.app')

@section('content')
    <section class="text-red-400 body-font">
        <div class="container px-44 py-4  mx-auto">
            <div class="flex flex-col text-base w-full mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">Beat Editor</h1>
                <h2 class="text-xs text-red-400 tracking-widest font-medium title-font mb-1">Enter beat information</h2>
            </div>
        </div>
        <div class="container px-44 mx-auto">
            <div style="display: flex; flex-direction: column;">
                <label for="email" class="leading-7 text-sm text-white text-center">Beat Name</label>
                <input type="email" class="border-l-2 bg-white bg-opacity-5 border-red-600 pl-2 font-light text-red-600 mt-3 p-1  mb-5" value="" placeholder="Murcia" name="email"/>
            </div>
            <div class="text-center border-b pb-12" style="display: flex;">
                <div style="width: 50%;">
                    <div style="display: flex; flex-direction: column;">
                        <label for="email" class="leading-7 text-sm text-white mr-8">Email</label>
                        <input type="email" class="border-l-2 bg-white bg-opacity-5 border-red-600 pl-2 font-light text-red-600 mt-3 p-1 mr-8 mb-5" value="" onclick="this.select()" placeholder="example@gmail.com" name="email"/>
                    </div>
                    <div style="display: flex; flex-direction: column;">
                        <label for="age" class="leading-7 text-sm text-white mr-8">Age</label>
                        <input type="number" class="border-l-2 bg-white bg-opacity-5 border-red-600 pl-2 font-light text-red-600 mt-3 p-1 mr-8" value="" onclick="this.select()" placeholder="AGE" name="age" />
                    </div>
                </div>
                <div style="width: 50%;">
                    <div style="display: flex; flex-direction: column;">
                        <label for="text" class="leading-7 text-sm text-white ml-8 ">City</label>
                        <input type="text" class="border-l-2 bg-white bg-opacity-5 border-red-600 pl-2 font-light text-red-600 mt-3 p-1 ml-8 mb-5" value="" onclick="this.select()" placeholder="CITY" name="city"/>
                    </div>
                    <div style="display: flex; flex-direction: column;">
                        <label for="text" class="leading-7 text-sm text-white ml-8">Genre</label>
                        <select type="text" class="border-l-2 bg-white bg-opacity-5 border-red-600 pl-2 font-light text-red-600 mt-3 p-1 ml-8" name="genre">
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
                <label for="beatFile" class="mb-2 inline-block text-white mt-5 text-center">Upload your beat</label>
                <input class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary" type="file" id="beatFile" />
                <h2 class="text-xs mt-1 text-red-400 tracking-widest font-medium title-font mb-1">Pick the type of license you want and upload your files.</h2>
            </div>
        </div>
    </section>
@endsection
