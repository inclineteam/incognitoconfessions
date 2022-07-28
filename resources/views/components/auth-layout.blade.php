@props(['title'])

<x-layout title="{{ $title }} | Incognito">
    <div class="h-auto min-h-screen bg-[#1B1C21] pt-28 pb-40">
        <a href="/"
            class="absolute top-5 left-10 flex w-max items-center space-x-2 text-xl text-white/50 hover:text-white/80">
            <span class="bg-shark-lighter rounded-full px-2 py-1">
                <i class="ai-glasses"></i>
            </span>
            <span class="font-semibold">Incognito</span>
        </a>

        <div class="bg-shark-lighter mx-auto w-full max-w-xl rounded-lg">
            <header class="px-8 pt-6 text-2xl font-semibold text-white/80">
                <p>{{ $title }}</p>
            </header>

            {{ $slot }}
        </div>
    </div>
</x-layout>
