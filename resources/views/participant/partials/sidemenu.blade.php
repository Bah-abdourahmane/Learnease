<div class="h-screen basis-[20%] bg-third text-white drop-shadow-md shadow__1 flex flex-col pt-2 shrink-0 ">
    {{-- logo --}}
    <div class="font-semibold border-b border-primary/50 text-xl p-3 cursor-pointer
">
        <a href="/">Learn<span class="text-secondary">Ease</span></a>
    </div>
    {{-- links --}}
    <div class="flex-grow border-b border-primary/50 text-sm pt-5 px-2">
        <ul>
            <li class="duration-300 hover:bg-primary/70 rounded-md">
                <x-nav-link class="hover:text-white block py-2 px-4" :href="route('participant.index')" :active="request()->routeIs('participant.index')">
                    Dashboard
                </x-nav-link>
            </li>
            <li class="duration-300 hover:bg-primary/70 rounded-md">
                <x-nav-link class="hover:text-white block py-2 px-4" :href="route('participant.courses')" :active="request()->routeIs('participant.courses')">
                    Explore courses
                </x-nav-link>
            </li>
        </ul>
    </div>
    {{-- user profile --}}
</div>
