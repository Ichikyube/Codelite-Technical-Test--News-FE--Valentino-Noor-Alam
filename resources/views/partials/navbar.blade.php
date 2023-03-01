<nav x-data="{ open: false }" class="relative z-10 w-full bg-slate-300 border-b border-gray-100 shadow">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex justify-between w-full px-6 lg:w-max md:px-0">
                    <a  class="flex items-center space-x-2" href="{{ route('welcome') }}" aria-label="logo">
                        <x-logo class="block w-auto h-16 mx-auto text-gray-800 fill-current dark:text-gray-200" />
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden gap-5 sm:flex sm:items-center sm:ml-6">
                <div class="container flex justify-center lg:justify-end">
                    <div class="pr-3">
                        <form action="">
                            <div class="relative inline-flex items-center transition-all duration-500 hover:pl-2 group">
                                <input type="text" placeholder="search..." name="search" class="inline-block overflow-hidden transition-all duration-500 bg-transparent border-0 rounded group-hover:border-2 w-80 whitespace-nowrap group-hover:max-w-screen-2xl group-hover:bg-white group-focus:max-w-screen-2xl max-w-0 scale-80 group-hover:scale-100 group-hover:px-2 group-focus:px-2">
                                <button class="absolute right-0 rotate-45 bottom-3 group"><svg class="w-6 h-6" fill="none"
                                        stroke="#777" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path class="stroke-sky-600 hover:stroke-black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @if (session('id_user'))
                    @if(Route::is('welcome') )
                        <div class="flex items-center h-16">
                            <a href="{{ route('news.create') }}" class="flex items-center justify-center mx-2 text-gray-100 transition duration-150 rounded">
                                <svg class="w-6 h-6 hover:fill-blue-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd">
                                    </path></svg>
                            </a>
                        </div>
                    @endif
                @endif
                
                @if (session('id_user'))
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <div class="flex">
                                <svg class="w-6 h-6 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                                <button class="flex items-center text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                                    <div>{{ session('username') }}</div>

                                    <div class="ml-1">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                            </div>

                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('changepassword')">
                                    {{ __('Change Password') }}
                                </x-dropdown-link>
                            <form method="POST" action="{{ route('auth.logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('auth.logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                    @else
                        <div class="w-full space-y-2 border-slate-200 lg:space-y-0 md:w-max lg:border-l">
                            @if (Route::has('login'))
                            <div class="space-x-4 ml-2">
                                @if (session('id_user'))
                                    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST">
                                        @csrf
                                        <a href="{{ route('auth.logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <button type="submit"
                                                class="w-full px-6 py-3 text-center transition duration-150 ease-in-out rounded-full active:bg-slate-200 focus:bg-slate-100 sm:w-max">Logout</button>
                                        </a>
                                    </form>
                                @else
                                @if (Route::has('auth.register'))
                                    <a href="{{ route("auth.register") }}">
                                        <button type="button" title="Start buying"
                                            class="w-full px-6 py-3 text-center transition duration-150 ease-in-out rounded-full active:bg-slate-200 focus:bg-slate-100 sm:w-max">
                                            <span class="block text-sm font-semibold text-slate-800">
                                                Sign up
                                            </span>
                                        </button>
                                    </a>
                                @endif
                                    <a href="{{ route("login") }}">
                                        <button type="button" title="Start buying"
                                            class="w-full px-6 py-3 text-center transition bg-slate-300 rounded-full hover:bg-slate-100 active:bg-slate-400 focus:bg-slate-300 sm:w-max">
                                            <span class="block text-sm font-semibold text-slate-900">
                                                Login
                                            </span>
                                        </button>
                                    </a>
                                @endif
                            </div>
                            @endif
                        </div>
                @endif
            </div>
            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        <!-- Responsive Settings Options -->N
        <div class="pt-4 pb-1 border-t border-gray-200">
            @if (session('id_user'))
                <div class="px-4">
                    <div class="text-base font-medium text-gray-800">{{ session('username') }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('auth.logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('auth.logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @endif
        </div>
    </div>
</nav>
