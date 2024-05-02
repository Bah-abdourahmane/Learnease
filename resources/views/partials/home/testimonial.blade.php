@php
    $photo ??= 'images/notuserfound.jpg';
    $name ??= 'Anonymous';
    $content ??= 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos vitae excepturi deserunt sunt
        pariatur!F';
@endphp
<div class="rounded-lg border border-primary cursor-pointer hover:bg-primary hover:text-white hover:scale-[1.03] hover:-translate-y-3 duration-300 shadow-md p-5 h-full flex flex-col">
    {{-- header --}}
    <div class="flex flex-col items-center gap-2 shrink-0">
        <div class="gradient__border_1 rounded-full w-14 h-14 bg-slate-200 shrink-0 relative">
            <img src="{{ asset($photo) }}" alt="" class="w-full h-full object-cover rounded-full">
        </div>
        <span class="font-medium capitalize ">{{ $name }}</span>
    </div>
    {{-- content --}}
    <p class="leading-7 py-5 text-sm flex-grow"> {{ $content }}</p>
</div>
