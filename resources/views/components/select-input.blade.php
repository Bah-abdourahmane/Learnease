@props(['options', 'name', 'selectedItem'])
<select id="{{ $name }}" name="{{ $name }}"
    {{ $attributes->merge(['class' => 'border border-gray-300 rounded-md focus:outline-none focus:ring-primary focus:border-primary w-full py-2']) }}
    required>
    @foreach ($options as $key => $value)
        <option value="{{ $key }}" {{ old($name, $selectedItem) == $key ? 'selected' : '' }}>
            {{ $value }}
        </option>
    @endforeach
</select>
<x-input-error :messages="$errors->get('$name')" class="mt-2" />
