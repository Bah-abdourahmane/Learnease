@extends('layouts.app-layout')
@section('content')
    <div class="w-full h-full p-5 lg:px-24 mb-10">
        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h1 class="text-3xl font-bold mb-4">Titre du Forum</h1>
            <p class="text-gray-600 mb-4">Description du forum.</p>
            <div class="flex items-center justify-between">
                <div class="flex items-center text-sm text-gray-500">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                        </path>
                    </svg>
                    <span>10 commentaires</span>
                </div>
                <span class="text-xs text-gray-400">Il y a 3 heures</span>
            </div>
        </div>
        <!-- Section des commentaires -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-xl font-semibold mb-4">Commentaires</h2>
            <!-- Liste des commentaires -->
            <div class="space-y-4">
                <div class="border border-gray-300 rounded-lg p-4">
                    <p>Contenu du commentaire.</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-sm text-gray-500">Nom de l'utilisateur</span>
                        <span class="text-xs text-gray-400">Il y a 1 heure</span>
                    </div>
                </div>
                <!-- Ajouter d'autres commentaires statiques ici -->
            </div>

            <!-- Formulaire de réponse (statique) -->
            <div class="mt-6">
                <textarea name="content" rows="3" placeholder="Répondre au commentaire..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"></textarea>
                <button type="submit"
                    class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none">Envoyer</button>
            </div>
        </div>
    </div>
@endsection
