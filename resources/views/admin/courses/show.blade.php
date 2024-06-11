@php
    $isCheck = $course->is_approved ? 'false' : 'true';
@endphp
@extends('admin.dashboard-layout')
@section('content')
    <div class=" bg-third text-white relative">
        <x-ui.custom-toast />
        {{-- banner --}}
        <div class="lg:h-[70vh] md:h-[40vh] h-[70vh] w-full pt-14"
            style="background: url('{{ asset('/images/course-4.jpg') }}') no-repeat center/cover">
            <div class="lg:pl-20 flex flex-col justify-between h-full pb-10">
                <div class="max-w-2xl">
                    <h1 class="max-w-4xl text-primary text-2xl leading-10 drop-shadow-xl ">
                        {{ $course->domain->name }}
                    </h1>
                    <p class=" rounded-md  font-bold text-3xl lg:text-4xl uppercase  py-5 pb-0 drop-shadow-xl">
                        {{ $course->title }}
                    </p>
                    <p class="font-bold uppercase  pt-5 ">
                        Author : <span class="font-normal">{{ $course->instructor->name }}</span>
                    </p>
                    <p class="font-bold uppercase  py-5">
                        Approved : <span
                            class="font-normal capitalize">{{ $course->is_approved ? 'Le cours est disponible' : "Le cours n'est disponible pour le moment" }}</span>
                    </p>
                    <div class="font-bold uppercase  py-5 flex items-center gap-2">
                        <span>
                            Change Course status :
                        </span>
                        <x-custom-switch-btn :course="$course" :isChecked="$course->is_approved" />
                    </div>
                </div>
            </div>
        </div>
        {{-- Cours content details --}}
        <div class="flex justify-between  gap-5 flex-wrap p-5 py-10">
            {{-- left --}}
            <div class="h-fit w-full lg:basis-[37%]">
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
                        <p class="text-sm leading-7 mb-5">{{ $course->description }}</p>
                    </div>
                    {{-- video card --}}
                    <div class="">
                        @if (
                            $course->chapters &&
                                $course->chapters->count() > 0 &&
                                $course->chapters->first()->videos &&
                                $course->chapters->first()->videos->count() > 0)
                            <?php $currentVideo = $course->chapters->first()->videos->first(); ?>
                            <video controls muted class="w-full h-[400px] rounded bg-slate-800">
                                <source src="{{ asset($currentVideo->videoUrl()) }}" />
                            </video>
                        @else
                            <p class="text-center text-sm">Aucune vidéo de Présentation disponible pour cette
                                formation</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- button de suppression and edite --}}
        <div class="flex items-center flex-wrap gap-10 p-5">
            <a href="{{ route('admin.courses.edit', $course) }}"
                class="text-primary border  border-primary px-5 py-3 min-w-52 rounded">
                Edit this course
            </a>
            <form action="{{ route('admin.courses.destroy', $course) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600  bg-red-200/20 px-5 py-3 min-w-52 rounded">
                    Delete this course
                </button>
            </form>
        </div>
    </div>
@endsection
