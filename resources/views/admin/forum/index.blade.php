@extends('admin.dashboard-layout')
@section('content')
    <div class="w-full p-5 mb-5">
        {{-- title and searchbar --}}
        <div class="mb-5 flex items-center flex-wrap justify-between gap-5">
            <h1 class="text-3xl font-bold">Forum de discussion</h1>
            <x-ui.custom-search-input />
        </div>
        <a href="{{ route('admin.forums.create') }}"
            class="inline-block rounded duration-300 hover:bg-primary my-3 px-5 py-2 border hover:text-white border-primary">
            Add new Message
        </a>
        {{-- list of forum --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse ($forums as $item)
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-2">
                        <a href="{{ route('admin.forums.show', $item->id) }}" class="hover:text-primary">
                            {{ $item->title }}
                        </a>
                    </h2>
                    <p class="text-gray-600 mb-4">{{ Str::limit($item->content, 130, '...') }}</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16m-7 6h7"></path>
                            </svg>
                            <span>{{ $item->comments->count() }}
                                commentaire{{ $item->comments->count() > 1 ? 's' : '' }}</span>
                        </div>
                        <span class="text-xs text-gray-400">Publier a {{ $item->created_at->format('H:i') }}</span>
                    </div>
                </div>
            @empty
                <p class="p-4 text-center font-medium">Pas de discussion</p>
            @endforelse
        </div>
    </div>
@endsection
