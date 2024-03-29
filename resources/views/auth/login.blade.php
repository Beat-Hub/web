@extends('layouts.app')

@section('content')
<div class="inline-flex justify-between w-full gap-10">
    <div class="bg-white bg-opacity-5 w-2/5 border-b-2 border-b-white border-opacity-5">
        <div class="bg-white bg-opacity-5 border-b-2 border-opacity-5 border-white p-4 text-lg uppercase tracking-widest">Login</div>
        <div class="p-4 mt-4">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="text-opacity-80 text-white">Email Address</label>

                    <div class="mt-2">
                        <input id="email" type="email" class="w-full p-2 bg-white bg-opacity-5 @error('email') border-red-900 border-2 rounded @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <div class="mt-2 text-red-900" role="alert">
                            <strong>(!) {{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password" class="text-opacity-80 text-white">Password</label>

                    <div class="mt-2">
                        <input id="password" type="password" class="w-full p-2 bg-white bg-opacity-5 @error('password') border-red-900 border-2 @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <div class="mt-2 text-red-900" role="alert">
                            <strong>(!) {{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 h-6">
                    <div class="float-right">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="text-white text-opacity-50 font-light" for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>

                <div class="mb-4">
                    <button type="submit" class="px-6 py-2 bg-red-600 w-full font-bold rounded-md border-b-2 border-red-800">
                        Login
                    </button>
                </div>

                <a class="float-right h-14 underline underline-offset-4 text-sm" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
            </form>
        </div>
    </div>
    <div class="bg-white bg-opacity-5 w-3/5 border-b-2 border-b-white border-opacity-5">
        <div class="bg-white bg-opacity-5 border-b-2 border-opacity-5 border-white p-4 text-lg uppercase tracking-widest">Join Us</div>
        <div class="p-4 mt-4">
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-4 text-red-600">Join us today and take your music career to the next level!</h2>
                <p class="text-lg text-white-700 mb-4"><span class="font-bold text-red-600">BeatHub</span> is a cutting-edge platform that empowers music producers to showcase and sell their original beats online. With a sleek and intuitive interface, customers can easily search, preview, and purchase a wide variety of high-quality beats. Our platform offers an unprecedented level of transparency and fairness, with <span class="font-bold text-red-600">low commissions</span> that enable music producers to earn more from their work. Whether you're a seasoned professional or just starting out, our platform is the ideal place to discover and connect with a vibrant community of artists and buyers from around the world.</p>
            </div>
        </div>
    </div>
</div>
@endsection
