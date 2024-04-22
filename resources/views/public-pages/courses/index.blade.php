@extends('layouts.app-layout')
@section('content')
    <div class="w-full h-full p-5 lg:px-24">
        <h2 class="title font-bold text-2xl md:text-3xl mb-10 tracking-wider">Cours en libre accès</h2>
        {{-- courses list container --}}
        <div class="w-full h-full space-y-5">
            @foreach ($courses as $course)
                <div
                    class="flex items-center lg:gap-5 flex-wrap lg:flex-nowrap rounded-lg lg:max-h-[250px] lg:min-h-[200px] shadow__1">
                    {{-- left images --}}
                    <div class="lg:basis-[40%] h-[200px] lg:max-h-[250px] lg:min-h-[200px] relative  w-full overflow-hidden">
                        @if ($course->cover_photo)
                            <img src="{{ $course->imageUrl() }}" alt=""
                                class="bg-center rounded-l-lg group-hover:scale-110 duration-500 transition-transform object-cover  h-full w-full" />
                        @else
                            <img src="{{ asset('/images/default_course_image.webp') }}" alt=""
                                class="bg-center rounded-l-lg group-hover:scale-110 duration-500 transition-transform object-cover  h-full w-full" />
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-white opacity-40 rounded-lg">
                        </div>
                    </div>
                    {{-- right description --}}
                    <div class="basis-full p-5 lg:p-0 lg:pr-5">
                        <h3 class="text-primary uppercase">{{ $course->category }}
                            </h4>
                            <h4 class="font-bold">
                                <a class="hover:text-primary py-2"
                                    href="{{ route('courses.show', $course->id) }}">{{ $course->title }}</a>
                            </h4>
                            {{-- level and total cours --}}
                            <div class="flex flex-wrap gap-5 items-center py-3">
                                <div class="flex items-center gap-1">
                                    <i class="fa fa-align-left text-secondary" aria-hidden="true"></i>
                                    <span>Lessons: 3</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <div class="text-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </div>

                                    <span>8 h</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    {{-- <i class="fa fa-signal text-secondary" aria-hidden="true"></i> --}}
                                    <x-dynamic-component :component="'icon-' . $course->level . '-level'" />
                                    <span>{{ $course->level }}</span>
                                </div>
                            </div>
                            {{-- description --}}
                            <p class="font-normal">
                                {{ Str::limit($course->description, 210, ' ...') }}
                            </p>
                    </div>
                </div>
            @endforeach
            {{ $courses->links() }}
        </div>
    </div>
@endsection
