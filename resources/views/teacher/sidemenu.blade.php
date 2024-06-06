<div class="h-screen basis-[25%] bg-third text-white drop-shadow-md shadow__1  flex-col p-2 hidden lg:flex ">
    {{-- logo --}}
    <div class="font-semibold border-b border-primary/50 text-xl  p-3 cursor-pointer
    ">
        <a href="/">Learn<span class="text-secondary">Ease</span></a>
    </div>
    {{-- user profile --}}

    {{-- links --}}
    <div class="flex-grow border-b border-primary/50 text-sm pt-5">
        <ul class="space-y-3">
            <li class="duration-300 hover:bg-primary/70 rounded-md">
                <x-nav-link class="hover:text-white block py-2 px-4" :href="route('teacher.index')" :active="request()->routeIs('teacher.index')">
                    Dashboard
                </x-nav-link>
            </li>
            <li class="duration-300 hover:bg-primary/70 rounded-md">
                <x-nav-link class="hover:text-white block py-2 px-4" :href="route('teacher.courses.index')" :active="request()->routeIs('teacher.courses.index')">
                    Mes Formations
                </x-nav-link>
            </li>

        </ul>
    </div>
    {{-- user profile --}}
    <div class="mt-auto py-5 hidden">
        <div class="flex items-center gap-3">
            <span class="w-10 h-10 overflow-hidden rounded-full bg-slate-300 shrink-0 border-2 border-primary">
                <img src="{{ asset('images/teacher-5.jpg') }}" alt="" class="rounded-full">
            </span>
            <span class=""> {{ Str::limit(auth()->user()->name, 10, '...') }}</span>
        </div>
    </div>
</div>
