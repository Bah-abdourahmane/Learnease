@props(['course'])
<div
    class="hover:gradient__course_border_1 snap-end p-1 rounded-lg relative w-full  drop-shadow-lg shadow__1   overflow-hidden group shrink-0">
    <div class="bg-white rounded-lg flex flex-col gap-2 w-full h-[350px] min-w-[240px]">
        <!-- image -->
        <div class="relative basis-[50%] w-full overflow-hidden rounded-lg flex items-center justify-center shrink-0">
            @if ($course->cover_photo)
                <img src="{{ $course->imageUrl() }}" alt=""
                    class="bg-center rounded-l-lg group-hover:scale-110 duration-500 transition-transform object-cover  h-full w-full" />
            @else
                <img src="{{ asset('/images/course-1.jpg') }}" alt=""
                    class="bg-center rounded-l-lg group-hover:scale-110 duration-500 transition-transform object-cover  h-full w-full" />
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-black to-white opacity-40 rounded-lg">
            </div>
            <button onclick="window.location='{{ route('courses.show', ['id' => $course->id]) }}'"
                class="bg-white/70 p-2 px-3 font-medium tracking-wide rounded absolute  z-50 hidden group-hover:block duration-500 scale-100">See
                details</button>
        </div>
        <!-- details -->
        <div class="p-2 font-medium flex flex-col justify-between text-sm basis-[50%]">
            {{-- title and category --}}
            <div class="">
                <h4 class="text-primary uppercase text-base">{{ $course->domain->name }}
                </h4>
                <h4 class="font-medium hover:underline ">
                    <a class="py-2 inline-block hover:text-secondary"
                        href="{{ route('courses.show', ['id' => $course->id]) }}">
                        {{ Str::limit($course->title, 30, '...') }}
                    </a>
                </h4>
            </div>
            {{-- description --}}
            <p class="font-normal">
                {{ Str::limit($course->description, 80, '...') }}
            </p>
            {{-- level and total cours --}}
            <div class="flex flex-wrap gap-3 items-center py-3">
                <div class="flex items-center gap-1">
                    <i class="fa fa-align-left text-secondary" aria-hidden="true"></i>
                    <span>Chapter: 3</span>
                </div>
                <div class="flex items-center gap-1">
                    <x-dynamic-component :component="'icon-' . $course->level . '-level'" class="text-secondary" />

                    <span class="capitalize">{{ $course->level }}</span>
                </div>
            </div>
        </div>

    </div>
</div>
