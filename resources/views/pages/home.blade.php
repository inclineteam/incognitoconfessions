<x-layout>
    <div class="flex h-auto min-h-screen bg-[#1B1C21]">
        <div>
            <x-confessions.confessions-sidebar />
        </div>
        @yield('content')
    </div>
</x-layout>
