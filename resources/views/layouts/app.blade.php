<x-layout>
    <div class="h-auto min-h-screen bg-zinc-900">
        <x-confessions.confessions-header />
        <div class="mx-auto w-full max-w-6xl pt-14 pb-40">
            @yield('content')
        </div>
    </div>
</x-layout>
