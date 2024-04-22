@extends('layouts.app-layout')
@section('content')
    <div class="max-w-5xl w-full shadow-md rounded p-5 mx-auto my-5">
        <h1 class="text-center text-xl font-medium uppercase mb-10">Créer un nouveau cours</h1>
        <form action="{{ route('courses.store') }}" method="POST" class="flex flex-col gap-y-8" enctype="multipart/form-data">
            @csrf
            {{-- title --}}
            <div>
                <x-input-label for="title" :value="__('Title')" class="" />
                <x-text-input id="title" class="block mt-1 w-full bg-white" type="text" name="title"
                    :value="old('title')" required autofocus />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            {{-- level --}}
            <div>
                <x-input-label for="level" :value="__('Level')" class="" />
                <select id="level" name="level"
                    class="border border-gray-300 rounded-md focus:outline-none focus:ring-primary focus:border-primary w-full py-2">
                    <option value="beginner" class="hover:bg-red-800">Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advenced">Advenced</option>
                </select>
                <x-input-error :messages="$errors->get('level')" class="mt-2" />
            </div>
            {{-- domains --}}
            <div>
                <x-input-label for="domain" :value="__('Training Category')" class="" />
                <select id="domain" name="domains_id"
                    class="border border-gray-300 rounded-md focus:outline-none focus:ring-primary focus:border-primary w-full py-2">
                    @foreach ($domains as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('domains_id')" class="mt-2" />
            </div>
            {{-- photo --}}
            <div>
                <x-input-label for="photo" :value="__('Photo')" class="" />
                <x-text-input id="photo" class="block mt-1 w-full bg-white outline-none border p-2" type="file"
                    name="cover_photo" :value="old('cover_photo')" required />
                <x-input-error :messages="$errors->get('cover_photo')" class="mt-2" />
            </div>
            {{-- description --}}
            <div>
                <x-input-label for="description" :value="__('Description')" />
                <textarea class="w-full resize-none border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                    id="description" name="description" rows="4" required></textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            {{-- submit button --}}
            <button type="submit"
                class="rounded duration-300 hover:bg-primary mt-5 px-5 py-2 border hover:text-white border-primary">Create
                the course
            </button>
        </form>
    </div>
@endsection
