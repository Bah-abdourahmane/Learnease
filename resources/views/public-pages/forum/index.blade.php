@extends('layouts.app-layout')
@section('content')
    <div class="w-full h-full p-5 lg:px-24 mb-10">
        {{-- title and searchbar --}}
        <div class="mb-6 flex items-center flex-wrap justify-between gap-5">
            <h1 class="text-3xl font-bold">Forum de discussion</h1>
            <input type="text" placeholder="Rechercher un forum..."
                class="max-w-72 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" />
        </div>
        @auth
            @if (auth()->user()->role === 'admin')
                <button class="my-3 py-2 px-5 border text-primary border-primary rounded">Ajouter</button>
            @endif
        @endauth
        {{-- list of forum --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- card 1 --}}
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-2">
                    <a href="{{ route('forum.show', ['id' => '1']) }}" class="hover:text-primary">
                        Sujet de discussion 1
                    </a>
                </h2>
                <p class="text-gray-600 mb-4">Résumé du sujet de discussion 1.</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                        <span>10 commentaires</span>
                    </div>
                    <span class="text-xs text-gray-400">Il y a 3 heures</span>
                </div>
            </div>
            {{-- card 2 --}}
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-2">
                    <a href="{{ route('forum.show', ['id' => '2']) }}" class="hover:text-primary">
                        Sujet de discussion 2
                    </a>
                </h2>
                <p class="text-gray-600 mb-4">Résumé du sujet de discussion 2.</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                        <span>5 commentaires</span>
                    </div>
                    <span class="text-xs text-gray-400">Il y a 1 jour</span>
                </div>
            </div>
        </div>
    </div>
@endsection
