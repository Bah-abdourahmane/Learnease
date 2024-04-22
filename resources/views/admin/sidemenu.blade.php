<div class="h-screen basis-[20%] bg-third text-white drop-shadow-md shadow__1  flex-col p-2 hidden lg:flex ">
    {{-- logo --}}
    <div class="font-semibold border-b border-primary/50 text-xl lg:text-2xl py-3 cursor-pointer
    ">
        <a href="/">Learn<span class="text-secondary">Ease</span></a>
    </div>
    {{-- user profile --}}

    {{-- links --}}
    <div class="flex-grow border-b border-primary/50 text-sm pt-5">
        <ul class="space-y-3">
            <li class="duration-300 hover:bg-primary/70 rounded-md">
                <x-nav-link class="hover:text-white block py-2 px-4" :href="route('admin.index')" :active="request()->routeIs('admin.index')">
                    Dashboard
                </x-nav-link>
            </li>
            <li class="duration-300 hover:bg-primary/70 rounded-md ">
                <x-nav-link class="hover:text-white block py-2 px-4" :href="route('admin.users.index')" :active="request()->routeIs('admin.students')">
                    Users
                </x-nav-link>
            </li>
            <li class="duration-300 hover:bg-primary/70 rounded-md">
                <x-nav-link class="hover:text-white block py-2 px-4" :href="route('admin.courses.index')" :active="request()->routeIs('admin.courses.index')">
                    Courses
                </x-nav-link>
            </li>
        </ul>
    </div>
    {{-- user profile --}}
    <div class="mt-auto py-5">
        <div class="flex items-center gap-3">
            <span class="w-10 h-10 overflow-hidden rounded-full bg-slate-300 shrink-0 border-2 border-primary">
                <img src="{{ asset('images/teacher-5.jpg') }}" alt="" class="rounded-full">
            </span>
            <span class=""> {{ Str::limit(auth()->user()->name, 10, '...') }}</span>
        </div>
    </div>
</div>
