@extends('admin.dashboard-layout')
@section('content')
    <div class="p-5">
        <h1 class="text-center text-xl font-medium uppercase mb-10">Ajouter un Nouveau Message</h1>
        <form action="{{ route('admin.forums.store') }}" method="POST">
            @csrf
            {{-- title --}}
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full bg-white" type="text" name="title" :value="old('title')"
                    required autofocus />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            {{-- description --}}
            <div>
                <x-input-label for="content" :value="__('Message')" />
                <textarea class="w-full resize-none border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                    id="content" name="content" rows="4" required></textarea>
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>
            {{-- submit button --}}
            <button type="submit"
                class="rounded duration-300 hover:bg-primary mt-5 px-5 py-2 border hover:text-white border-primary">
                Publish
            </button>
        </form>

    </div>
@endsection
