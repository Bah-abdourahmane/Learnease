@extends('layouts.app-layout')
@section('content')
    <div class="h-full bg-third text-white">
        {{-- banner --}}
        <div class="lg:h-[70vh] md:h-[40vh] h-[70vh] w-full pt-14 px-5"
            style="background: url('{{ asset('/images/course-4.jpg') }}') no-repeat center/cover">
            <div class="lg:pl-20 flex flex-col justify-between h-full pb-10">
                <div class="max-w-2xl">
                    <h1 class="max-w-4xl text-primary text-2xl leading-10 drop-shadow-xl ">
                        {{ $course->domain->name }}
                    </h1>
                    <p class=" rounded-md  font-bold text-3xl lg:text-4xl uppercase  py-5 pt-0 drop-shadow-xl">
                        {{ $course->title }}
                    </p>
                    <p class="drop-shadow-xl">
                        {{ Str::limit($course->description, 100, ' ...') }}
                    </p>
                </div>
                @if ($course->chapters->count() > 0)
                    <button
                        class="border-primary border-2 hover:bg-primary hover:text-white text-primary rounded pl-3 pr-8 py-3 text-lg  w-fit duration-500 flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.91 11.672a.375.375 0 0 1 0 .656l-5.603 3.113a.375.375 0 0 1-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112Z" />
                        </svg>
                        <span>Commencer</span>
                    </button>
                @endif

            </div>
            {{-- right Image --}}
        </div>
        {{-- Cours content details --}}
        <div class="flex justify-between  gap-5 flex-wrap p-5 lg:px-24 py-10">
            {{-- left --}}
            <div class="h-fit w-full lg:basis-[35%]">
                <h1 class="text-2xl mb-5">Chapitres</h1>
                <div class="bg-[#22244d] px-[2px] rounded py-5 drop-shadow-md shadow-md text-sm">
                    <x-course-chapter :course='$course' />
                </div>
            </div>
            {{-- right --}}
            <div class="lg:basis-[60%]">
                <h1 class="text-2xl mb-5">Présentation</h1>
                <div class="bg-[#22244d] rounded p-5 drop-shadow-md shadow-md">
                    {{-- paragraphes --}}
                    <div class="">
                        <p class="drop-shadow-xl">
                            {{ $course->description }}
                        </p>
                    </div>
                    {{-- video card --}}
                    <div class="">
                        <video controls poster="{{ asset('images/default_course_image.webp') }}" muted
                            class="w-full h-[400px] rounded bg-slate-800">
                            <source src="{{ asset('video.mp4') }}" />
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
