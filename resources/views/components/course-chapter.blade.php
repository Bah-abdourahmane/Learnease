@props(['course', 'limit' => 20, 'currentVideo' => null])
<div class="">
    @forelse ($course->chapters as $chapter)
        <h3 class="text-lg px-3 my-1 capitalize">{{ $chapter->title }}</h3>
        <div class="space-y-1">
            @forelse($chapter->videos as $video)
                <ul class="px-3">
                    <li>
                        <button
                            class="w-full duration-300  gap-2 px-3 py-2 rounded {{ $currentVideo === $video->id ? 'bg-third/90 text-primary' : 'hover:bg-third/90' }} text-sm">
                            <a href="{{ route('courses.videos', ['coursID' => $course->id, 'videoID' => $video->id]) }}"
                                class="flex items-center justify-between">
                                {{-- left video title --}}
                                <div class="w-full flex items-center gap-3">
                                    <span
                                        class="rounded-full w-8 h-8  flex items-center  {{ $currentVideo === $video->id ? 'bg-primary text-white' : 'bg-third/60' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M9 15.713V8.287q0-.368.244-.588q.243-.22.568-.22q.101 0 .213.028q.11.028.212.083l5.842 3.733q.186.13.28.298q.093.167.093.379t-.093.379q-.094.167-.28.298l-5.842 3.733q-.102.055-.214.083q-.112.028-.213.028q-.325 0-.568-.22Q9 16.081 9 15.713" />
                                        </svg>
                                    </span>
                                    <span>{{ Str::limit($video->title, $limit, '...') }}</span>
                                </div>
                                {{-- right duration --}}
                                <span class="opacity-60 shrink-0">3 min</span>
                            </a>
                        </button>
                    </li>
                </ul>
            @empty
                <p class="text-center text-sm">Aucune vidéo</p>
            @endforelse
        </div>
    @empty
        <p class="p-3 text-center text-xl text-secondary">Aucun chapitre disponible pour ce cours.</p>
    @endforelse
</div>
