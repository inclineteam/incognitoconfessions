<header class="sticky top-0 z-50 flex items-center border-b border-zinc-800 bg-zinc-900/80 py-3 backdrop-blur-md">
    <div class="mx-auto flex w-full max-w-6xl items-center justify-between">
        <div class="flex items-center space-x-6">
            <div class="flex justify-center w-[5rem]">
                <a href="/">
                    <i class="ai-glasses text-4xl text-zinc-300"></i>
                </a>
            </div>
            @if (Route::current()->getName() == 'confessions')
                <x-confessions.confessions-searchbar />
            @endif
        </div>

        @if (auth()->user())
            <div class="items-center hidden sm:flex  burger:hidden space-x-14">
                <nav class="flex items-center space-x-10">
                    <x-confessions.header-nav-item icon="ai-home" text="Home" link="home" />
                    <x-confessions.header-nav-item icon="ai-envelope" text="Confessions" link="confessions" />
                </nav>


                <div x-data="{ profileDropdown: false }" class="flex pr-5 justify-center">
                    <button @click="profileDropdown = !profileDropdown"
                        class="group flex items-center space-x-2 font-medium">
                        <span class="text-zinc-200">{{ auth()->user()->name }}</span>
                        <i x-bind:class="profileDropdown ? 'translate-y-[2px]' : 'group-hover:translate-y-[2px]'"
                            class="ai-chevron-down text-sm text-zinc-400 duration-200"></i>
                    </button>

                    <div @click.outside="profileDropdown = false"
                        class="absolute right-0 z-40 mt-7 mr-5 w-[22rem] rounded-xl border border-zinc-800 bg-zinc-900 py-4 shadow-xl shadow-black/50"
                        x-show="profileDropdown" x-transition x-cloak>
                        <div class="py-2 pl-8 pr-10">
                            <p class="text-lg font-semibold text-zinc-300">{{ auth()->user()->name }}
                            </p>
                            <p class="mb-2 text-sm text-zinc-400">{{ auth()->user()->email }}</p>
                            <p class="text-sm text-zinc-400">{{ auth()->user()->confessions()->count() }}
                                confessions created</p>
                        </div>

                        <div class="my-4 border-t border-zinc-800"></div>

                        @if (auth()->user()->email_verified_at == null)
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <button
                                    class="group flex w-full items-center justify-between space-x-4 px-8 py-1 text-left text-sm text-zinc-400 duration-150 hover:bg-zinc-800 hover:text-zinc-300">
                                    <span>
                                        Verify your email
                                    </span>
                                    <i class="ai-stop text-lg text-zinc-500 duration-150 group-hover:text-zinc-300"></i>
                                </button>
                            </form>
                        @endif
                        
                        <!-- remove when oAuth is used -->

                        @if (auth()->user()->provider == null)
                            <form method="GET" action="{{ route('profile.show') }}">
                                @csrf
                                <button
                                class="group flex w-full items-center justify-between space-x-4 px-8 py-1 text-left text-sm text-zinc-400 duration-150 hover:bg-zinc-800 hover:text-zinc-300">
                                    <span>
                                        Change Password
                                    </span>
                                    <i class="ai-lock-on text-lg text-zinc-500 duration-150 group-hover:text-zinc-300"></i>
                                </button>
                            </form>
                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                class="group flex w-full items-center justify-between space-x-4 px-8 py-1 text-left text-sm text-zinc-400 duration-150 hover:bg-zinc-800 hover:text-zinc-300">
                                <span>
                                    Sign out
                                </span>
                                <i class="ai-sign-out text-lg text-zinc-500 duration-150 group-hover:text-zinc-300"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div x-data="{ profileDropdown: false }" class="flex pr-5 sm:hidden  burger:flex justify-center">
                <button @click="profileDropdown = !profileDropdown"
                    class="group flex items-center space-x-2 font-medium">
                    <div class="p-2 space-y-[0.3rem] opacity-50 rounded shadow">
                        <span class="block w-5 h-0.5 bg-gray-100"></span>
                        <span class="block w-5 h-0.5 bg-gray-100"></span>
                        <span class="block w-5 h-0.5 bg-gray-100"></span>
                    </div>
                </button>

                <div @click.outside="profileDropdown = false"
                    class="absolute right-0 z-40 mt-7 mr-5 w-[22rem] rounded-xl border border-zinc-800 bg-zinc-900 py-4 shadow-xl shadow-black/50"
                    x-show="profileDropdown" x-transition x-cloak>
                    <div class="py-2 pl-8 pr-10">
                        <p class="text-lg font-semibold text-zinc-300">{{ auth()->user()->name }}
                        </p>
                        <p class="mb-2 text-sm text-zinc-400">{{ auth()->user()->email }}</p>
                        <p class="text-sm text-zinc-400">{{ auth()->user()->confessions()->count() }}
                            confessions created</p>
                    </div>
                    <div class="my-4 border-t border-zinc-800"></div>
                    <div class="flex justify-center">
                        <nav class="flex items-center space-x-10">
                            <x-confessions.header-nav-item icon="ai-home" text="Home" link="home" />
                            <x-confessions.header-nav-item icon="ai-envelope" text="Confessions" link="confessions" />
                        </nav>
                    </div>
                    <div class="my-4 border-t border-zinc-800"></div>

                    @if (auth()->user()->email_verified_at == null)
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button
                                class="group flex w-full items-center justify-between space-x-4 px-8 py-1 text-left text-sm text-zinc-400 duration-150 hover:bg-zinc-800 hover:text-zinc-300">
                                <span>
                                    Verify your email
                                </span>
                                <i class="ai-stop text-lg text-zinc-500 duration-150 group-hover:text-zinc-300"></i>
                            </button>
                        </form>
                    @endif
                    
                    <!-- remove when oAuth is used -->
                    
                    @if (auth()->user()->provider == null)
                        <form method="GET" action="{{ route('profile.show') }}">
                            @csrf
                            <button
                            class="group flex w-full items-center justify-between space-x-4 px-8 py-1 text-left text-sm text-zinc-400 duration-150 hover:bg-zinc-800 hover:text-zinc-300">
                                <span>
                                    Change Password
                                </span>
                                <i class="ai-lock-on text-lg text-zinc-500 duration-150 group-hover:text-zinc-300"></i>
                            </button>
                        </form>
                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            class="group flex w-full items-center justify-between space-x-4 px-8 py-1 text-left text-sm text-zinc-400 duration-150 hover:bg-zinc-800 hover:text-zinc-300">
                            <span>
                                Sign out
                            </span>
                            <i class="ai-sign-out text-lg text-zinc-500 duration-150 group-hover:text-zinc-300"></i>
                        </button>
                    </form>
                </div>
            </div>

            
        @else
            <div class="space-x-5 mr-5">
                <a href="{{ route('login') }}">
                    <span class="ml-2 text-sm font-medium text-zinc-300">Login</span>
                </a>
                <a href="{{ route('register') }}">
                    <button
                        class="rounded-lg border-t border-indigo-400 bg-indigo-500 px-4 py-3 text-sm font-medium text-white">
                        Sign up
                    </button>
                </a>
            </div>
        @endif
    </div>
</header>
