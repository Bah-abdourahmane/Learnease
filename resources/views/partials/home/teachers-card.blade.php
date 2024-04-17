@php
    $photoUrl ??= 'images/teacher-1.jpg';
    $name ??= '';
    $profession ??= '';
@endphp
<div class="rounded-lg relative h-[300px] drop-shadow-lg shadow__2 w-full lg:w-64 overflow-hidden group">
    <img src="{{ asset($photoUrl) }}" alt="" loading="lazy"
        class="bg-center group-hover:scale-110 duration-500 transition-transform object-cover rounded-lg h-full w-full">
    <div class="z-10 absolute bottom-3 px-2 py-1 text- rounded-lg text-white  tracking-wider">
        <h4 class="font-semibold text-lg">{{ $name }}</h4>
        <p class="text-sm font-normal">{{ $profession }}</p>
    </div>
    <!-- overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-black to-white opacity-40"></div>
</div>
