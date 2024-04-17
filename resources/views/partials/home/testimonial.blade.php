@php
    $photo ??= 'images/noProfile.png';
    $name ??= 'Anonymous';
    $content ??= 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos vitae excepturi deserunt sunt
        pariatur!F';
@endphp
<div class="rounded-lg bg-white shadow-md p-5 h-[273px]">
    {{-- header --}}
    <div class="flex items-center gap-2">
        <span class="border-2 border-primary rounded-full w-14 h-14 bg-slate-200 shrink-0"></span>
        <span class="font-medium text-lg capitalize ">{{ $name }}</span>
    </div>
    {{-- content --}}
    <p class="leading-7 py-5"> {{ Str::limit($content, 120, '...') }}</p>
</div>
