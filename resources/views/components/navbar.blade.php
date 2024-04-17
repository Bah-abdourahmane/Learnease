<header class="font-medium px-5 lg:px-24 sticky top-0 z-50 bg-white/50 backdrop-blur-md">
    <div class="flex items-center gap-5 justify-between w-full h-20">
        {{-- logo --}}
        <div class="font-semibold text-xl cursor-pointer">
            <a href="/">Learn<span class="text-secondary">Ease</span></a>
        </div>
        <div class="hidden md:flex gap-10 items-center ">
            <x-nav-link :href="route('courses.index')" :active="request()->routeIs('courses.index')">
                Courses
            </x-nav-link>
            <x-nav-link href="about" :active="request()->routeIs('about')">
                About
            </x-nav-link>
            <x-nav-link href="forum" :active="request()->routeIs('forum')">
                Forum
            </x-nav-link>
            <x-nav-link href="contact" :active="request()->routeIs('contact')">
                Contact
            </x-nav-link>
        </div>
        @auth
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        @endauth
        @if (!Auth::user())
            <div class="hidden sm:flex gap-5 items-center">
                <button onclick="window.location='{{ route('login') }}'" class="hover:text-primary duration-500">
                    Log in
                </button>
                <button onclick="window.location='{{ route('register') }}'"
                    class="bg-primary rounded px-8 py-2 text-white duration-500">
                    Register
                </button>
            </div>
        @endif
    </div>
</header>
