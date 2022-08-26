<x-layout>
    <div class="h-auto min-h-screen bg-zinc-900">
        <x-confessions.confessions-header />
        <div class="flex justify-center">
            <!-- Adsense -->
        </div>
        <div class="mx-auto w-full max-w-6xl pt-14 pb-40">
            @yield('content')
        </div>
        <div class="flex justify-center">
            <!-- Adsense -->
        </div>
    </div>
</x-layout>
