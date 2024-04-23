@php
    $photo ??= 'images/notuserfound.jpg';
    $name ??= 'Anonymous';
    $content ??= 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos vitae excepturi deserunt sunt
        pariatur!F';
@endphp
<div class="rounded-lg bg-white shadow-md p-5 h-[273px]">
    {{-- header --}}
    <div class="flex items-center gap-2">
        <div class="gradient__border_1 rounded-full w-14 h-14 bg-slate-200 shrink-0 relative">
            <img src="{{ asset($photo) }}" alt="" class="w-full h-full object-cover rounded-full">
        </div>
        <span class="font-medium text-lg capitalize ">{{ $name }}</span>
    </div>
    {{-- content --}}
    <p class="leading-7 py-5"> {{ Str::limit($content, 120, '...') }}</p>
</div>
