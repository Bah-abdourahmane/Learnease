@extends('participant.dashboard-layout')
@section('content')
    <div class="w-full p-5">
        <div class="space-y-5">
            @foreach ($courses as $course)
                <x-course.large-card :course="$course" href="participant.courses.show" />
            @endforeach
        </div>
        @if ($courses->count() >= 5)
            <div class="mt-5 shadow-md p-3">
                {{ $courses->links() }}
            </div>
        @endif

    </div>
@endsection
