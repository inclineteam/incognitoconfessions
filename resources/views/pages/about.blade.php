<x-layout>
    <div class="h-auto min-h-screen bg-zinc-900">
        <div class="mx-auto max-w-[1400px]">
            <div class="bg-img relative bg-[top_right] bg-no-repeat">
                <div
                    class="absolute top-0 bottom-0 right-0 w-20 bg-gradient-to-r from-zinc-900/0 via-zinc-900/20 to-zinc-900">
                </div>
                <div class="bg-gradient-to-r from-zinc-900 via-zinc-900 to-zinc-900/0">
                    @if(auth()->user())
                        <x-confessions.confessions-header />
                    @else
                        <x-landing.header />
                    @endif
                </div>
            </div>
            <p class="text-white">
                This is the about page.
            </p>

        </div>
    </div>
</x-layout>