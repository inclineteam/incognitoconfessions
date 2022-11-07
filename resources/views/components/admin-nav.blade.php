<header x-data="{ mobileNavDropdown: false }" class="responsive-padding relative mx-auto w-full max-w-6xl py-8">
    <div class="flex items-center justify-between text-zinc-200">
        <a href="/" class="flex select-none items-center space-x-2 text-xl">
            <span class="rounded-full bg-zinc-800 px-2 py-1">
                <i class="ai-glasses"></i>
            </span>
            <span class="font-[Quicksand]">Incognito</span>
        </a>
        
        {{-- <div class="collapse hidden space-x-12 font-medium sm:block navbar-collapse" id="navbarNav">
            <ul class="navbar-nav flex mr-auto">
                <li class="nav-item mr-10 {{ Route::is('log-viewer::dashboard') ? 'active' : '' }}">
                    <a href="{{ route('log-viewer::dashboard') }}" class="nav-link">
                        <i class="fa fa-dashboard"></i> @lang('Dashboard')
                    </a>
                </li>
                <li class="nav-item {{ Route::is('log-viewer::logs.list') ? 'active' : '' }}">
                    <a href="{{ route('log-viewer::logs.list') }}" class="nav-link">
                        <i class="fa fa-archive"></i> @lang('Logs')
                    </a>
                </li>
            </ul>
        </div> --}}

        <button @click="mobileNavDropdown = true" class="block sm:hidden">
            <i class="ai-three-line-horizontal text-2xl"></i>
        </button>
    </div>

    {{-- Mobile nav --}}
    <div class="fixed top-0 left-0 right-0 z-50 block border-b border-zinc-700 bg-zinc-800/90 pt-4 pb-8 text-center shadow-2xl shadow-zinc-900 backdrop-blur sm:hidden"
        @click.outside="mobileNavDropdown = false" x-show="mobileNavDropdown"
        x-transition:enter="transition-all duration-300" x-transition:enter-start="-translate-y-full"
        x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition-all duration-500"
        x-transition:leave-start="translate-y-0" x-transition:leave-end="-translate-y-[100vh]" x-cloak>
        <div class="mb-2 flex items-center justify-between py-2 pl-4 pr-8">
            <a href="/" class="select-none text-xl text-zinc-200">
                <span class="block rounded-full bg-zinc-700 px-2 py-1">
                    <i class="ai-glasses"></i>
                </span>
            </a>
            <i @click="mobileNavDropdown = false" class="ai-cross text-xl text-zinc-400"></i>
        </div>
        <div class="py-2 text-sm font-medium text-zinc-200">
            <a href={{ route('confessions') }} class="block pb-4">About</a>
            <a href="{{ route('about') }}" class="block py-4">Confessions</a>
            <a href={{ route('login') }} class="block pt-4">
                <button class="text-[#FFFBD7]">
                    Sign in
                </button>
            </a>
        </div>
    </div>
</header>
