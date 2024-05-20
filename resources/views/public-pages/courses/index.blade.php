@extends('layouts.app-layout')
@section('content')
    <div class="w-full p-5 pb-10 lg:px-24">
        <div class="flex justify-between w-full gap-4 items-center mb-10">
            <h2 class="title font-bold text-2xl md:text-3xl tracking-wider">Cours en libre accès</h2>
            <form action="{{ route('courses.index') }}" method="get">
                <x-ui.custom-search-input name="searchcourse" />
            </form>
        </div>
        {{-- courses list container --}}
        <div class="w-full h-full space-y-5">
            @if (count($coursRecherches) > 0)
                @foreach ($coursRecherches as $course)
                    <x-course.large-card :course="$course" />
                @endforeach
            @elseif($nomCoursRecherche)
                <p class="text-center ">Aucun résultat trouvé pour <span class="font-medium">"{{ $nomCoursRecherche }}"</span>
                </p>
            @else
                @foreach ($courses as $course)
                    <x-course.large-card :course="$course" />
                @endforeach
            @endif
        </div>
        @if ($courses->count() > 10)
            <div class="mt-5 shadow-md p-3">
                {{ $courses->links() }}
            </div>
        @endif
    </div>
@endsection
