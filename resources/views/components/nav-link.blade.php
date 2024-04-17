@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'text-primary relative after:absolute after:-bottom-1 after:bg-primary after:w-5 after:rounded-lg  after:h-1 after:flex after:items-center after:justify-center duration-500 ease-in-out'
            : 'hover:text-primary duration-500 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
