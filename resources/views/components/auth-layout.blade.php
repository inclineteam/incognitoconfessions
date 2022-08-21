@props(['title'])

<x-layout title="{{ $title }} | Incognito">
    <div class="h-auto min-h-screen bg-zinc-900 pt-28 pb-40">
        <a href="/"
            class="absolute top-5 left-10 flex w-max items-center space-x-2 text-xl text-zinc-400 hover:text-zinc-200">
            <span class="bg-shark-lighter rounded-full px-2 py-1">
                <i class="ai-glasses"></i>
            </span>
            <span class="font-semibold">Incognito</span>
        </a>

        <div class="flex justify-center">
            <!-- Adsense -->
        </div>

        <div class="mx-auto w-[96%] max-w-xl rounded-lg bg-zinc-800">
            <header class="px-8 pt-6 text-2xl font-semibold text-zinc-300">
                <p>{{ $title }}</p>
            </header>

            {{ $slot }}

        </div>
        <div class="flex justify-center">
            <!-- Adsense -->
        </div>
    </div>
</x-layout>
