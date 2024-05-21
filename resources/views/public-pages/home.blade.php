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
                <a class="inline-block" href="#cours-cards-section">
                    <x-ui.custom-outline-button title="Explore More" />
                </a>
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
                <a class="mt-5 inline-block" href="{{ route('courses.index') }}">
                    <x-ui.custom-outline-button title="Let's Get Started" />
                </a>
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
                <x-ui.custom-home-search-course-input name="search_course_in_home_page" :courses="$courses" :coursRecherches="$coursRecherches"
                    :nomCoursRecherche="$nomCoursRecherche" />
            </div>
            <!-- course cards wrapper -->
            <div class="lg:mt-10" id="cours-cards-section">
                <!-- top  bar for filtering -->
                <div class="flex justify-between items-center gap-5 flex-wrap">
                    <h2 class="font-semibold text-lg"><span class="text-primary">&bull;</span>Popular courses</h2>
                    <div class="hidden fle items-center flex-wrap gap-5 font-medium">
                        <button class="active:scale-95 duration-300 text-primary">All course</button>
                        <button class="active:scale-95 duration-300 hover:text-primary">Bureautique</button>
                        <button class="active:scale-95 duration-300 hover:text-primary">Web Development</button>
                    </div>
                </div>
                <!-- cards -->
                <div
                    class="snap-x flex items-center 2xl:justify-center lg:grid lg:grid-cols-3 2xl:grid-cols-4 overflow-x-auto lg:overflow-hidden gap-5 py-10 pt-16 px-1">
                    @foreach ($courses as $course)
                        @include('partials.home.course-card', [
                            'course' => $course,
                        ])
                    @endforeach
                </div>
            </div>
        </section>
        {{-- become Teacher --}}
        <section class="pb-10">
            <div class="container text-center bg-gradient-to-tl from-primary/35 to-primary py-10 text-white">
                <h2 class="text-2xl font-semibold mb-4">Devenir un Formateur</h2>
                <p class="mb-6 max-w-xl mx-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                    tempor incididunt
                    ut labore et dolore magna aliqua.</p>
                <a href="{{ route('instructor.registration.form') }}"
                    class="bg-white text-blue-500 py-2 px-4 rounded inline-block">Remplir le formulaire</a>
            </div>
        </section>

        <!-- our Teacher -->
        <section class="py-10 pt-0">
            <h3 class="title lg:text-4xl font-bold">Our Experienced Mentors</h3>
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
            <h3 class="title lg:text-4xl font-bold">Testimonial</h3>
            <!-- cards wrappers -->
            <div
                class="max-w-8xl mx-auto flex items-center lg:grid lg:grid-cols-3 lg:items-stretch flex-wrap gap-5 py-10 pt-16">
                {{-- card 1 --}}
                <div>
                    @include('partials.home.testimonial', [
                        'name' => 'Bah Abdou',
                        'content' =>
                            "je suis très content de mon expérience ici. Les instructeurs sont compétents et les cours sont faciles à suivre. Merci pour cette opportunité d'apprentissage en ligne !.",
                        'photo' => 'images/teacher-5.jpg',
                    ])
                </div>
                {{-- card 3 --}}
                <div>
                    @include('partials.home.testimonial', [
                        'name' => 'Imane chou',
                        'content' =>
                            "Les cours sont excellents ! J'ai appris énormément de choses utiles et les vidéos sont très bien expliquées. Je recommande vivement ce site !",
                        'photo' => 'images/teacher-3.jpg',
                    ])
                </div>
                {{-- card 4 --}}
                <div>
                    @include('partials.home.testimonial', [
                        'name' => 'Aimane Pourquoi',
                        'content' =>
                            "Ce site m'a aidé à améliorer mes compétences rapidement. Les exercices pratiques sont très instructifs et j'ai pu appliquer ce que j'ai appris dans mes projets. Merci pour cette plateforme de qualité !",
                        // 'photo' => 'images/teacher-6.jpg',
                    ])
                </div>
            </div>
        </section>
    </div>
@endsection
