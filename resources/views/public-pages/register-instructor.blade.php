@extends('layouts.wrapper')
@section('content')
    <div class="min-h-screen overflow-auto p-5 flex justify-center items-center">
        <div
            class="relative flex items-center justify-center bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 rounded-xl">
            <div
                class="absolute -top-1 -left-1 -right-1 -bottom-1 rounded-lg bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 shadow-lg animate-pulse">
            </div>
            {{-- wrapper grid --}}
            <div
                class="bg-white z-10 container items-center justify-center grid md:grid-cols-2 mx-auto shadow-md rounded-xl">
                {{-- left formulaire --}}
                <form method="POST" action="{{ route('instructor.register') }}" class="p-5 pb-3 space-y-3">
                    @csrf
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" class="text-" />
                        <x-text-input id="name" class="block mt-1 w-full shadow-md drop-shadow-md" type="text"
                            name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" class="text-" />
                        <x-text-input id="email" class="block mt-1 w-full  shadow-md drop-shadow-md" type="email"
                            name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" class="text-" />
                        <x-text-input id="password" class="block mt-1 w-full shadow-md drop-shadow-md" type="password"
                            name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Phone number -->
                    <div>
                        <x-input-label for="Phone Number" :value="__('Phone')" class="tex" />
                        <x-text-input id="phone" class="block mt-1 w-full  shadow-md drop-shadow-md" type="tel"
                            name="phone" :value="old('phone')" required autocomplete="phone" />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <input type="hidden" name="role" value="teacher">
                    <input type="hidden" name="isAccepted" value="0">

                    <div class="flex items-center justify-end pt-5 gap-5">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-ui.custom-outline-button title="Register" type="submit" />
                    </div>
                </form>
                <div
                    class="w-full h-full relative overflow-hidden bg-slate-100 order-first lg:order-last rounded-tr-xl rounded-br-xl">
                    <img src="/images/course-1.jpg" alt="" class="rounded-tr-xl rounded-br-xl h-full">

                    <a title="aller a la home page" href="{{ route('home.index') }}"
                        class="bg-white rounded-full absolute top-5 right-5">
                        <x-ui.custom-circle-arrow-back />
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
