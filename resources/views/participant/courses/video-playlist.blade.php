@extends('participant.dashboard-layout')
@section('content')
    <div class="h-full bg-third text-white">
        {{-- video wrapper section --}}
        <div class="">
            {{-- Video --}}
            <div class="lg:h-[80vh] h-[450px] w-full pt-2 pb-5 lg:pb-0">
                <video class="w-full lg:h-full h-[450px] rounded bg-slate-800" controls muted>
                    <source src="{{ asset($currentVideo->videoUrl()) }}" />
                </video>
            </div>
            {{--  --}}
            <div class="p-5 lg:mx-10 bg-darkblue text-sm rounded">
                <x-cours-bread-cumbs :course='$course' :currentVideo='$currentVideo' />
                {{-- buttons --}}
                <div class="flex justify-between items-center gap-5 flex-wrap  pt-5">
                    <button
                        class="rounded-full px-5 py-2 border border-primary text-primary bg-primary/30 capitalize">{{ $course->level }}</button>
                    <button class="rounded-full px-5 py-2 bg-blackColor/70 hover:bg-blackColor">Télécharger la video</button>
                </div>
            </div>


        </div>
        {{-- Cours content details --}}
        <div class="flex justify-between  gap-5 lg:gap-10 flex-wrap lg:flex-nowrap p-5 lg:px-10 py-10">
            {{-- left --}}
            <div class="lg:basis-[40%] w-full shrink-0 bg-darkblue rounded py-5 drop-shadow-md shadow-md text-sm ">
                <x-course-chapter :course='$course' :currentVideo='$currentVideo->id' />
            </div>
            {{-- right --}}
            <div class="flex-grow">
                <h1 class="lg:text-3xl text-xl mb-5 font-bold">À propos de ce tutoriel</h1>
                <p class="leading-9">
                    {{ $currentVideo->description }}
                </p>
            </div>
        </div>
    </div>
@endsection
