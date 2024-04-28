@extends('layouts.app-layout')
@section('content')
    <div class="w-full h-full p-5 lg:px-24 mb-10">
        @if (@session('success'))
            <div class="rounded bg-green-300 p-3 mb-3">{{ session('success') }}</div>
        @endif
        <h1 class="text-3xl font-bold mb-4 text-primary">Contactez-nous</h1>
        <p class="mb-6">N'hésitez pas à nous contacter pour toute question, suggestion ou demande d'informations.
            Remplissez le formulaire ci-dessous et nous vous répondrons dès que possible.</p>
        <form action="{{ route('contact.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf
            <div>
                <x-input-label for="name" :value="__('Nom')" class="" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="email" :value="__('Email')" class="" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="col-span-2">
                <x-input-label for="message" :value="__('Message')" class="" />
                <textarea id="message" name="message" rows="5"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:border-blue-500"></textarea>
            </div>
            <div class="col-span-2">
                <button
                    class="px-6 py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none">Envoyer</button>
            </div>
        </form>
    </div>
@endsection
