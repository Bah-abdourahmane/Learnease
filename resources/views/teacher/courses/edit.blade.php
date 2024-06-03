@php
    $levelOptions = [
        'beginner' => 'Beginner',
        'intermediate' => 'Intermediate',
        'advenced' => 'Advenced',
    ];
@endphp
@extends('admin.dashboard-layout')
@section('content')
    <div class="max-w-5xl w-full shadow-md rounded p-5 mx-auto my-5">
        <h1 class="text-center text-xl font-medium uppercase mb-10">Modifier le cours</h1>
        <form action="{{ route('admin.courses.update', $course) }}" method="POST" class="flex flex-col gap-y-8"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- title --}}
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full bg-white" type="text" name="title" :value="old('title', $course->title)"
                    required autofocus />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            {{-- level --}}
            <div>
                <x-input-label for="level" :value="__('Level')" />
                <select id="level" name="level"
                    class= 'border border-gray-300 rounded-md focus:outline-none focus:ring-primary focus:border-primary w-full py-2'>
                    <option {{ old('level', $course->level) == 'beginner' ? 'selected' : '' }} value="beginner">
                        Beginner
                    </option>
                    <option {{ old('level', $course->level) == 'intermediate' ? 'selected' : '' }} value="intermediate">
                        Intermediate
                    </option>
                    <option {{ old('level', $course->level) == 'advenced' ? 'selected' : '' }} value="advenced">
                        Advenced
                    </option>
                </select>
            </div>
            {{-- domains --}}
            <div>
                <x-input-label for="domains_id" :value="__('Domain')" class="" />
                <select id="domains_id" name="domains_id"
                    class= 'border border-gray-300 rounded-md focus:outline-none focus:ring-primary focus:border-primary w-full py-2'
                    required>
                    @foreach ($domains->pluck('name', 'id') as $key => $value)
                        <option {{ old('domains_id', $course->domains_id) == $key ? 'selected' : '' }}
                            value="{{ $key }}">
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('domains_id')" class="mt-2" />
            </div>
            {{-- photo --}}
            <div class="">
                <x-input-label for="photo" :value="__('Photo')" class="" />
                <x-text-input id="photo" class="block mt-1 w-full bg-white outline-none border p-2" type="file"
                    name="cover_photo" accept="image/*" />
                <x-input-error :messages="$errors->get('cover_photo')" class="mt-2" />
            </div>
            {{-- description --}}
            <div>
                <x-input-label for="description" :value="__('Description')" />
                <textarea class="w-full resize-none border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                    id="description" name="description" rows="4" required>{{ old('description', $course->description) }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            {{-- submit button --}}
            <button type="submit"
                class="rounded duration-300 hover:bg-primary mt-5 px-5 py-2 border hover:text-white border-primary">
                Update course
            </button>
        </form>
    </div>
@endsection
