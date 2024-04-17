@extends('layouts.app-layout')
@section('content')
    <div class="max-w-5xl w-full shadow-md rounded p-5 mx-auto">
        <h1 class="text-center text-xl font-medium uppercase mb-10">Créer un nouveau cours</h1>
        <form action="" method="POST">
            @csrf
            <div>
                <x-input-label for="title" :value="__('Title')" class="" />
                <x-text-input id="title" class="block mt-1 w-full bg-white" type="text" name="title" :value="old('title')"
                    required autofocus />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="description" :value="__('Description')" />
                <textarea class="w-full resize-none border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                    id="description" name="description" rows="3" required></textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="level" :value="__('Level')" class="" />
                <select id="level" name="level"
                    class="border border-gray-300 rounded-md focus:outline-none focus:ring-primary focus:border-primary w-full">
                    <option value="beginner" class="hover:bg-red-800">Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advenced">Advenced</option>
                </select>
                <x-input-error :messages="$errors->get('level')" class="mt-2" />
            </div>

            <button type="submit" class="btn btn-primary mt-5 px-5 py-2 border">Créer le cours</button>
        </form>
    </div>
@endsection
