@extends('layouts.app')

@section('content')
    <div class="inline-flex justify-between w-full gap-10">
        <div class="bg-white bg-opacity-5 w-2/5 border-b-2 border-b-white border-opacity-5">
            <div class="bg-white bg-opacity-5 border-b-2 border-opacity-5 border-white p-4 text-lg uppercase tracking-widest">Register</div>
            <div class="p-4 mt-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="text-opacity-80 text-white">Name</label>
                            <div class="mt-3">
                                <input id="name" type="text" class="w-full p-2 bg-white bg-opacity-5 @error('name') is-invalid border-red-900 border-2 rounded @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">

                            <label for="email" class="text-opacity-80 text-white">Email Address</label>
                            <div class="mt-2">
                                <input id="email" type="email" class="w-full p-2 bg-white bg-opacity-5 @error('email') is-invalid border-red-900 border-2 rounded @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="text-opacity-80 text-white">Password</label>

                            <div class="mt-2">
                                <input id="password" type="password" class="w-full p-2 bg-white bg-opacity-5 @error('password') is-invalid border-red-900 border-2 rounded @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="text-opacity-80 text-white">Repeat Password</label>

                            <div class="mt-2">
                                <input id="password-confirm" type="password" class="w-full p-2 bg-white bg-opacity-5" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mt-10">
                            <button type="submit" class="px-6 py-2 bg-red-600 w-full font-bold rounded-md border-b-2 border-red-800">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bg-white bg-opacity-5 w-3/5 border-b-2 border-b-white border-opacity-5">
                <div class="bg-white bg-opacity-5 border-b-2 border-opacity-5 border-white p-4 text-lg uppercase tracking-widest">Other content</div>
                <div class="p-4 mt-4">
                    ba3
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
