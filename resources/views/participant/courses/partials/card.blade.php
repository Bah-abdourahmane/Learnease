@props(['course'])
<div
    class="cursor-pointer flex items-center lg:gap-5 flex-wrap lg:flex-nowrap rounded-lg lg:max-h-[250px] lg:min-h-[200px] shadow__1">
    {{-- left images --}}
    <div class="lg:basis-[40%] h-[200px] lg:max-h-[250px] lg:min-h-[200px] relative  w-full overflow-hidden">
        <img src="images/course-1.jpg" alt="" loading="lazy"
            class="bg-center rounded-l-lg group-hover:scale-110 duration-500 transition-transform object-cover  h-full w-full">
        <div class="absolute inset-0 bg-gradient-to-t from-black to-white opacity-40 rounded-lg">
        </div>
    </div>
    {{-- right description --}}
    <div class="basis-full p-5 lg:p-0 lg:pr-5">
        <h3 class="text-primary uppercase">{{ $course->category }}
            </h4>
            <h4 class="py-2 font-bold">
                {{ $course->title }}
            </h4>
            {{-- level and total cours --}}
            <div class="flex flex-wrap gap-5 items-center py-3">
                <div class="flex items-center gap-1">
                    <i class="fa fa-align-left text-secondary" aria-hidden="true"></i>
                    <span>Lessons: 3</span>
                </div>
                <div class="flex items-center gap-1">
                    <div class="text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>

                    <span>8 h</span>
                </div>
                <div class="flex items-center gap-1">
                    <i class="fa fa-signal text-secondary" aria-hidden="true"></i>
                    <span>{{ $course->level }}</span>
                </div>
            </div>
            {{-- description --}}
            <p class="font-normal">
                {{ Str::limit($course->title, 500, ' ...') }}
            </p>
    </div>
</div>
