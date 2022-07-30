<header class="mx-auto max-w-6xl py-8">
    <div class="flex items-center justify-between text-white/80">
        <a href="/" class="flex items-center space-x-2 text-xl">
            <span class="bg-shark-lighter rounded-full px-2 py-1">
                <i class="ai-glasses"></i>
            </span>
            <span class="font-semibold">Incognito</span>
        </a>
        <nav class="space-x-12 font-medium">
            <a href={{ route('confessions') }}>Confessions</a>
            <a href="#about">About</a>
            <button @click="modal = true" class="bg-shark-lighter rounded py-3 px-5 font-medium">Sign in</button>
        </nav>
    </div>
</header>
