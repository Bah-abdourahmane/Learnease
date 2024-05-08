@extends('admin.dashboard-layout')
@section('content')
    <div class="w-full p-5 mb-10">
        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <div class="flex items-center gap-4 mb-4">
                <a href="{{ route('admin.forums.index') }}">
                    <x-ui.custom-circle-arrow-back />
                </a>
                <h1 class="text-3xl font-bold">{{ $forum->title }}</h1>
            </div>
            <p class="text-gray-600 mb-4">{{ $forum->content }}</p>
            <span class="block text-sm text-gray-400 text-right">Publier le
                {{ $forum->created_at->format('d/m/Y à H:i') }}</span>
        </div>
        <!-- Section des commentaires -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-xl font-semibold mb-4">Commentaires <span>({{ $forum->comments->count() }})</span></h2>
            <!-- Liste des commentaires -->
            <div class="space-y-4">
                @forelse ($forum->comments as $item)
                    <div class="border border-gray-300 rounded-lg p-4">
                        <div class="flex items-center justify-between mt-2">
                            <span class="text-sm text-gray-500">{{ $item->user->name }}</span>
                            <span class="text-xs text-gray-400">Publier le
                                {{ $item->created_at->format('d/m/Y:H:m') }}</span>
                        </div>
                        <p>Contenu du commentaire.</p>
                    </div>
                @empty
                    <p class="p-4 font-medium">Pas de commentaire.</p>
                @endforelse
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
