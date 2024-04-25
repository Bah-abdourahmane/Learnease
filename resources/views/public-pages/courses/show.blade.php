@extends('layouts.app-layout')
@section('content')
    <div class="h-full bg-third text-white">
        {{-- banner --}}
        <div class="lg:h-[70vh] md:h-[40vh] h-[70vh] w-full pt-14 px-5"
            style="background: url('{{ $course->cover_photo ? $course->imageUrl() : asset('/images/course-4.jpg') }}') no-repeat center/cover">
            <div class="lg:pl-20 flex flex-col justify-between h-full pb-10">
                <div class="">
                    <h1 class="max-w-4xl text-primary text-2xl leading-10 drop-shadow-xl ">
                        {{ $course->domain->name }}
                    </h1>
                    <p
                        class=" rounded-md bg-black/20 w-fit text-white font-bold text-3xl lg:text-5xl uppercase  py-5 max-w-xl drop-shadow-xl">
                        {{ $course->title }}
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
                    <div class="">
                        @forelse ($course->chapters as $chapter)
                            <h3 class="text-xl px-3 my-1 capitalize">{{ $chapter->title }}</h3>
                            @forelse($chapter->videos as $video)
                                <ul class="pl-3">
                                    <li>
                                        <button
                                            class="w-full duration-300 flex items-center justify-between gap-2 px-3 py-2 rounded  hover:bg-third/90">
                                            <div class="flex items-center gap-4">
                                                <span class="rounded-full w-8 h-8 bg-third/60 flex items-center text-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                        viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M9 15.713V8.287q0-.368.244-.588q.243-.22.568-.22q.101 0 .213.028q.11.028.212.083l5.842 3.733q.186.13.28.298q.093.167.093.379t-.093.379q-.094.167-.28.298l-5.842 3.733q-.102.055-.214.083q-.112.028-.213.028q-.325 0-.568-.22Q9 16.081 9 15.713" />
                                                    </svg>
                                                </span>
                                                <span>{{ $video->title }}</span>
                                            </div>
                                            <span class="opacity-60">3 min</span>
                                        </button>
                                    </li>
                                </ul>
                            @empty
                                <p class="text-center text-sm">Aucune vidéo</p>
                            @endforelse
                        @empty
                            <p class="p-3 text-center text-xl text-secondary">Aucun chapitre disponible pour ce cours.</p>
                        @endforelse
                    </div>
                </div>
            </div>
            {{-- right --}}
            <div class="lg:basis-[60%]">
                <h1 class="text-2xl mb-5">Présentation</h1>
                <div class="bg-[#22244d] rounded p-5 drop-shadow-md shadow-md">
                    {{-- paragraphes --}}
                    <div class="">
                        <p class="text-sm leading-7 mb-5">Laravel est un framework PHP. créé par Taylor Otwell en 2011, qui
                            permet de simplifier le développement d'applications web tout en gardant le code bien organisé.
                            Depuis sa création, Laravel est devenu l'un des frameworks PHP les plus populaires et les plus
                            utilisés, avec une communauté de développeurs en constante croissance.</p>
                        <p class="text-sm leading-7 mb-5">Laravel est basé sur le modèle MVC (Modèle-Vue-Contrôleur), qui
                            permet
                            de séparer le code en trois couches distinctes pour une meilleure organisation et une
                            maintenance
                            plus facile. Le modèle s'occupe de la logique de l'application et de l'interaction avec la base
                            de
                            données, la vue est responsable de l'affichage de l'interface utilisateur, et le contrôleur agit
                            comme une passerelle entre le modèle et la vue, en traitant les requêtes entrantes et en
                            envoyant
                            les données à la vue.</p>
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
