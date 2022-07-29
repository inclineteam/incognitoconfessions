@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition:leave="transition ease-in duration-250"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0" x-cloak
        class="fixed top-5 left-1/2 z-50 flex -translate-x-1/2 overflow-hidden rounded-lg bg-zinc-800 shadow-xl">


        <div class="flex items-center space-x-4 py-5 pl-6 pr-8">
            <span class="flex h-[38px] w-[38px] items-center justify-center rounded-full bg-blue-500/10">
                <i class="ai-info text-2xl text-blue-400"></i>
            </span>

            <span class="text-zinc-300">
                {{ session('message') }}
            </span>
        </div>

        <button @click="show = false"
            class="flex items-center border-l border-zinc-700/30 px-4 text-zinc-400 duration-150 hover:bg-zinc-700/30">
            <i class="ai-cross"></i>
        </button>
    </div>
@endif
