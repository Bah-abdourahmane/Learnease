@extends('admin.dashboard-layout')
@section('content')
    <div class="max-w-5xl w-full shadow-md rounded p-5 mx-auto my-5">
        <h1 class="text-center text-xl font-medium uppercase mb-10">Modifier L'utilisateur</h1>
        <form action="{{ route('admin.teachers.update', $teacher) }}" method="POST" class="flex flex-col gap-y-8">
            @csrf
            @method('PATCH')
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $teacher->name)" required
                    autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            {{-- <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $participant->email)"
                    required autocomplete="participantname" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div> --}}

            <!-- Password -->
            {{-- <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div> --}}

            <!-- Phone number -->
            <div>
                <x-input-label for="Phone Number" :value="__('Phone')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone', $teacher->phone)"
                    required autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            {{-- status --}}
            <div>
                <x-input-label for="status" :value="__('Status')" />
                <select id="status" name="isAccepted"
                    class= 'border border-gray-300 rounded-md focus:outline-none focus:ring-primary focus:border-primary w-full py-2'>
                    <option value="0" {{ old('isAccepted', $teacher->isAccepted) == 0 ? 'selected' : '' }}>
                        En Attente
                    </option>
                    <option value="1" {{ old('isAccepted', $teacher->isAccepted) == 1 ? 'selected' : '' }}>
                        Verifier
                    </option>
                </select>
            </div>

            {{-- submit button --}}
            <button type="submit"
                class="rounded duration-300 hover:bg-primary mt-5 px-5 py-2 border hover:text-white border-primary">Modify
                Formateur
            </button>
        </form>
    </div>
@endsection
