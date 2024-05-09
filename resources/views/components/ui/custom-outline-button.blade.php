@props(['title', 'type' => 'button'])
<button type="{{ $type }}"
    class="hover:bg-primary text-primary hover:text-white  border  border-primary rounded font-medium duration-500 px-8 py-2">
    {{ $title }}
</button>
