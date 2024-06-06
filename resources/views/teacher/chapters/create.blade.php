@extends('teacher.dashboard-layout')
@section('content')
    <div class="max-w-5xl w-full shadow-md rounded p-5 mx-auto my-5">
        <h1 class="text-center text-xl font-medium uppercase mb-10">Créer un nouveau Chapitre</h1>
        <form action="{{ route('teacher.chapters.store') }}" method="POST" class="flex flex-col gap-y-8">
            @csrf
            {{-- title --}}
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full bg-white" type="text" name="title" :value="old('title')"
                    required autofocus />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            {{-- Course --}}
            <div>
                <x-input-label for="course_id" :value="__('Course')" class="" />
                <select id="course_id" name="course_id"
                    class= 'border border-gray-300 rounded-md focus:outline-none focus:ring-primary focus:border-primary w-full py-2'
                    required>
                    @foreach ($course->pluck('title', 'id') as $key => $value)
                        <option value="{{ $key }}">
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('course_id')" class="mt-2" />
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
                class="rounded duration-300 hover:bg-primary mt-5 px-5 py-2 border hover:text-white border-primary">
                Create Chapter
            </button>
        </form>
    </div>
@endsection
