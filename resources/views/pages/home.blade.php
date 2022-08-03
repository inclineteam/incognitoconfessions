<x-layout>
    <div class="flex flex-col h-auto min-h-screen bg-[#1B1C21]">
        <div>
            <x-confessions.confessions-sidebar />
        </div>
        @yield('content')
        <x-modal.confess/>
    </div>
</x-layout>
