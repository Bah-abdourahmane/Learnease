@props(['course', 'currentVideo'])
<nav class="flex border-b border-gray-200 pb-2 text-lg " aria-label="Breadcrumb">
    <ol role="list" class="flex items-center gap-5 flex-wrap">
        <li class="flex">
            <div class="flex items-center gap-3">
                <a href="{{ route('courses.index') }}" class="">
                    Courses
                </a>
                <span>/</span>
            </div>
        </li>
        <li class="flex">
            <div class="flex items-center gap-3">
                <a href="{{ route('courses.show', ['id' => $course->id]) }}" class="">
                    {{ Str::limit($course->title, 35, '...') }}
                </a>
                <span>/</span>
            </div>
        </li>
        <li class="flex">
            <div class="flex items-center gap-3">
                <span class="">
                    {{ Str::limit($currentVideo->title, 40, '...') }}
                </span>
            </div>
        </li>
    </ol>
</nav>
