<x-layout>
    <div class="h-auto min-h-screen bg-zinc-900">
        <div class="mx-auto max-w-[1400px]">
            <div class="bg-img relative bg-no-repeat [background-position:-20rem_-5rem] sm:bg-[top_right]">
                <div
                    class="absolute top-0 bottom-0 right-0 hidden w-20 bg-gradient-to-r from-zinc-900/0 via-zinc-900/20 to-zinc-900 lg:block">
                </div>
                <div class="bg-gradient-to-r from-zinc-900 via-zinc-900 to-zinc-900/0">
                    <x-landing.header />
                    <x-landing.hero />
                </div>
            </div>
            <x-landing.confessions :confessions="$confessions" />
        </div>
    </div>
</x-layout>
