@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'text-primary hover:text-inherit duration-500 ease-in-out'
            : 'hover:text-primary duration-500 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
