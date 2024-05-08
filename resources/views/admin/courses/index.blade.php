@extends('admin.dashboard-layout')
@section('content')
    <div class="p-5 pt-3">
        @if (@session('success'))
            <div class="rounded bg-green-300 p-3 mb-3">{{ session('success') }}</div>
        @endif
        {{-- top btns --}}
        <div class="flex justify-between mb-5 flex-wrap gap-5 sticky top-0 z-20 bg-white py-2">
            <h1 class="font-semibold text-xl">List of courses</h1>
            <div class="flex items-center gap-3 flex-wrap">
                <a href="{{ route('admin.videos.create') }}"
                    class="block rounded-md bg-primary px-3 py-2 text-center text-sm font-semibold text-white">
                    Add new video
                </a>
                <a href="{{ route('admin.chapters.create') }}"
                    class="block rounded-md bg-primary px-3 py-2 text-center text-sm font-semibold text-white">
                    Add new Chapter
                </a>
                <a href="{{ route('admin.courses.create') }}"
                    class="block rounded-md bg-primary px-3 py-2 text-center text-sm font-semibold text-white">
                    Add new Course
                </a>
            </div>
        </div>
        {{-- courses card wrapper --}}
        <div
            class="snap-x flex items-center 2xl:justify-center lg:grid lg:grid-cols-3 2xl:grid-cols-4 overflow-x-auto lg:overflow-hidden gap-5 pb-10 px-1">
            @foreach ($courses as $course)
                <div
                    class="snap-end p-1 rounded-lg relative w-full  drop-shadow-lg shadow__1   overflow-hidden group shrink-0">
                    <div class="bg-white rounded-lg flex flex-col gap-2 w-full h-[350px] min-w-[240px]">
                        <!-- image -->
                        <div
                            class="relative basis-[50%] w-full overflow-hidden rounded-lg flex items-center justify-center shrink-0">
                            @if ($course->cover_photo)
                                <img src="{{ $course->imageUrl() }}" alt=""
                                    class="bg-center rounded-l-lg group-hover:scale-110 duration-500 transition-transform object-cover  h-full w-full" />
                            @else
                                <img src="{{ asset('/images/course-1.jpg') }}" alt=""
                                    class="bg-center rounded-l-lg group-hover:scale-110 duration-500 transition-transform object-cover  h-full w-full" />
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black to-white opacity-40 rounded-lg">
                            </div>
                            <button onclick="window.location='{{ route('admin.courses.show',$course->id) }}'"
                                class="bg-white/70 p-2 px-3 font-medium tracking-wide rounded absolute  z-50 hidden group-hover:block duration-500 scale-100">See
                                details</button>
                        </div>
                        <!-- details -->
                        <div class="p-2 font-medium flex flex-col justify-between text-sm basis-[50%]">
                            <div class="">
                                <h4 class="text-primary uppercase text-base">{{ $course->domain->name }}
                                </h4>
                                <h4 class="font-medium hover:underline ">
                                    <a class="py-2 inline-block hover:text-secondary"
                                        href="{{ route('admin.courses.show', $course->id) }}">
                                        {{ Str::limit($course->title, 28, '...') }}
                                    </a>
                                </h4>
                            </div>
                            {{-- description --}}
                            <p class="font-normal">
                                {{ Str::limit($course->description, 50, '...') }}
                            </p>
                            {{-- level and total cours --}}
                            <div class="flex flex-wrap gap-3 items-center py-3">
                                <div class="flex items-center gap-1">
                                    <i class="fa fa-align-left text-secondary" aria-hidden="true"></i>
                                    <span>Chapter: {{ $course->chapters->count() }}</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <x-dynamic-component :component="'icon-' . $course->level . '-level'" class="text-secondary" />

                                    <span class="capitalize">{{ $course->level }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-5">
            {{ $courses->links() }}
        </div>
    </div>
@endsection
