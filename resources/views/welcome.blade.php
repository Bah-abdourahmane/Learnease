@extends('layouts.app-layout')
@section('content')
    <div class="px-5 lg:px-24">
        <!-- banner Section -->
        <section class="w-full flex items-center flex-wrap-reverse lg:flex-nowrap py-10" id="banner">
            <!-- left text -->
            <div class="w-full lg:basis-[55%] lg:space-y-5">
                <h2 class="title font-bold text-2xl md:text-5xl lg:whitespace-nowrap tracking-wider">Embark on a
                    learning</h2>
                <h2 class="title font-bold text-2xl md:text-5xl lg:whitespace-nowrap tracking-wider">Adventure Online
                </h2>
                <p class="pr-5 pb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus aperiam
                    blanditiis ipsum nihil minima error illum reprehenderit, rem exercitationem, quidem tempora quisquam
                    facilis ipsam ullam itaque dignissimos.</p>
                <button
                    class="hover:bg-primary scale-95 hover:scale-100 text-primary hover:text-white  border  border-primary rounded px-8 py-2 font-medium active:scale-95 duration-500">Explore
                    More</button>
            </div>
            <!-- right image -->
            <div class="w-full lg:basis-[55%] relative">
                <img src="images/bannerImage.png" alt="">
            </div>
        </section>
        <!-- our online education section -->
        <section class="flex flex-wrap lg:flex-nowrap py-10 pt-20 gap-5">
            <div class="w-full lg:basis-1/2">
                <img src="images/17947.jpg" alt="">
            </div>
            <div class="w-full lg:basis-1/2 pt-5 flex flex-col 2xl:gap-5">
                <h2 class="title font-bold text-2xl md:text-4xl 2xl:text-5xl tracking-wider">Our Online Education</h2>
                <h2 class="title font-bold text-2xl md:text-5xl tracking-wider">Is Smart & Effective</h2>
                <p class="mt-10 leading-7 tracking-wide">Lorem ipsum dolor sit amet. ipsum dolor sit amet consectetur
                    adipisicing elit. Eos fugiat numquam asperiores eaque deserunt aliquid quasi beatae veritatis
                    adipisci sed?</p>
                <button
                    class="mt-5 scale-95 hover:scale-100 w-fit hover:bg-primary text-primary hover:text-white  border  border-primary rounded px-8 py-2 font-medium active:scale-95 duration-500">Let's
                    Get Started</button>
            </div>
        </section>
        <!-- popular Courses -->
        <section class="py-10">
            <!--  title and search Input -->
            <div class="flex flex-col justify-center items-center gap-5">
                <div class="">
                    <h2 class="title font-bold text-2xl md:text-5xl tracking-wider">Search among <span
                            class="text-primary">1000+ </span>courses</h2>
                    <h2 class="title font-bold text-2xl md:text-5xl tracking-wider">and find your favorite course</h2>
                </div>
                <!-- search input -->
                <div
                    class="w-full flex items-center justify-center gap-2 max-w-[600px] my-5 bg-white relative p-3 rounded shadow__1 overflow-hidden">
                    <button type="button"
                        class="text-sm bg-primary text-white p-2  rounded z-20 font-medium">Categories</button>
                    <input type="search" name="" placeholder="Search for courses..." class="rounded w-full" />
                </div>
            </div>
            <!-- course cards wrapper -->
            <div class="lg:my-10">
                <!-- top  bar for filtering -->
                <div class="flex justify-between items-center gap-5 flex-wrap">
                    <h2 class="font-semibold text-lg"><span class="text-primary">&bull;</span>Popular courses</h2>
                    <div class="flex items-center flex-wrap gap-5 font-medium">
                        <button class="active:scale-95 duration-300 hover:text-primary">All course</button>
                        <button class="active:scale-95 duration-300 hover:text-primary">Design</button>
                        <button class="active:scale-95 duration-300 hover:text-primary">Development</button>
                        <button class="active:scale-95 duration-300 hover:text-primary">Marketing</button>
                    </div>
                </div>
                <!-- cards -->
                <div
                    class="snap-x flex items-center 2xl:justify-center lg:grid lg:grid-cols-3 2xl:grid-cols-4 overflow-x-auto lg:overflow-hidden gap-5 xl:gap-10 py-10 pt-16 px-1">
                    @foreach ($courses as $course)
                        <div onclick="window.location='{{ route('courses.show', ['id' => $course->id]) }}'"
                            class="cursor-pointer snap-end p-2 rounded-lg relative w-full  h-[350px] drop-shadow-lg shadow__1 max-w-[400px] min-w-[240px] overflow-hidden group">
                            <!-- image -->
                            <div
                                class="relative h-[170px] w-full overflow-hidden rounded-lg flex items-center justify-center">
                                <img src="images/course-1.jpg" alt="" loading=""
                                    class="bg-center group-hover:scale-110 duration-500 transition-transform object-cover rounded-lg h-full w-full">
                                <div class="absolute inset-0 bg-gradient-to-t from-black to-white opacity-40 rounded-lg">
                                </div>
                                <button onclick="window.location='{{ route('courses.show', ['id' => $course->id]) }}'"
                                    class="bg-white/70 p-2 px-3 text-primary font-medium tracking-wide rounded absolute  z-50 hidden group-hover:block duration-500 scale-100 active:scale-95">See
                                    details</button>
                            </div>
                            <!-- details -->
                            <div class="pt-2 font-medium">
                                <h4 class="text-primary uppercase">{{ $course->category }}
                                </h4>
                                <h4 class="text-sm py-2 font-bold">
                                    {{ Str::limit($course->title, 35, '...') }}
                                </h4>
                                {{-- description --}}
                                <p class="text-sm font-normal">
                                    {{ Str::limit($course->description, 100, '...') }}
                                </p>
                                {{-- level and total cours --}}
                                <div class="flex flex-wrap gap-5 items-center py-3 text-xs">
                                    <div class="flex items-center gap-1">
                                        <i class="fa fa-align-left text-secondary" aria-hidden="true"></i>
                                        <span>Lessons: 3</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <i class="fa fa-clock-o text-primary" aria-hidden="true"></i>
                                        <span>8 h</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <i class="fa fa-signal text-secondary" aria-hidden="true"></i>
                                        <span>{{ $course->level }}</span>
                                    </div>
                                </div>

                                <!-- start btn -->
                                <div class="z-20 absolute bottom-2 left-2 flex justify-between items-center">
                                    {{-- <button type="button"
                                    class="bg-primary text-sm opacity-90 hover:bg-[#7c62fb] tracking-wider  hover:opacity-100 rounded px-3 py-1 text-white scale-100 active:scale-95 font-medium duration-500">Start
                                    course</button> --}}
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- our Teacher -->
        <section class="py-10 pt-0">
            <div class="flex justify-between gap-5 items-center">
                <h3 class="title lg:text-4xl font-bold">Our Experienced Mentors</h3>
                <button
                    class="bg-primary hover:scale-100 rounded px-8 py-2 text-white scale-100 active:scale-95 duration-500">View
                    All</button>
            </div>
            <!-- cards wrappers -->
            <div class="flex items-center xl:justify-center xl:flex-nowrap flex-wrap gap-5 lg:gap-8 2xl:gap-16 py-10 pt-16">
                {{-- card 1 --}}
                @include('partials.home.teachers-card', [
                    'name' => 'Imane Doe',
                    'profession' => 'UI/UX Designer',
                    'photoUrl' => 'images/teacher-1.jpg',
                ])
                <!-- card 2 -->
                @include('partials.home.teachers-card', [
                    'name' => 'Aimane Doe',
                    'profession' => 'Content Writing',
                    'photoUrl' => 'images/teacher-2.jpg',
                ])
                <!-- card 3 -->
                @include('partials.home.teachers-card', [
                    'name' => 'Abdourahmane Bah',
                    'profession' => 'Web Developper',
                    'photoUrl' => 'images/teacher-5.jpg',
                ])
                <!-- card 4 -->
                @include('partials.home.teachers-card', [
                    'name' => 'Shara Harrison',
                    'profession' => 'Digital Marketing',
                    'photoUrl' => 'images/teacher-4.jpg',
                ])
            </div>
        </section>
        <!-- Testimonial -->
        <section class="mb-10 py-10">
            <div class="flex justify-between gap-5 items-center">
                <h3 class="title lg:text-4xl font-bold">Testimonial</h3>
                {{-- <button class="bg-primary rounded px-8 py-2 text-white">View
                    All</button> --}}
            </div>
            <!-- cards wrappers -->
            <div class="max-w-7xl mx-auto flex items-center lg:grid lg:grid-cols-4 flex-wrap gap-5 py-10 pt-16">
                {{-- card 1 --}}
                <div>
                    @include('partials.home.testimonial', [
                        'name' => 'Bah Abdou',
                        // 'content' => 'content here!',
                        'photo' => 'images/teacher-1.jpg',
                    ])
                </div>
                {{-- card 2 --}}
                <div>
                    @include('partials.home.testimonial', [
                        'name' => 'Anonymous',
                        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, id?',
                        'photo' => 'images/teacher-1.jpg',
                    ])
                </div>
                {{-- card 3 --}}
                <div>
                    @include('partials.home.testimonial', [
                        'name' => 'Imane chou',
                        // 'content' => 'content here!',
                        'photo' => 'images/teacher-1.jpg',
                    ])
                </div>
                {{-- card 4 --}}
                <div>
                    @include('partials.home.testimonial', [
                        'name' => 'Aimane Pourquoi',
                        // 'content' => 'content here!',
                        'photo' => 'images/teacher-1.jpg',
                    ])
                </div>
            </div>
        </section>
    </div>
@endsection
