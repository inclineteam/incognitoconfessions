<x-layout>
<!--test-->
    <div class="h-auto min-h-screen bg-[#1B1C21]">
        <div class="mx-auto max-w-[1400px]">
            <div class="bg-img relative bg-[top_right] bg-no-repeat">
                <div
                    class="absolute top-0 bottom-0 right-0 w-20 bg-gradient-to-r from-[#1B1C21]/0 via-[#1B1C21]/20 to-[#1B1C21]">
                </div>
                <div class="bg-gradient-to-r from-[#1B1C21] via-[#1B1C21] to-[#1B1C21]/0">
                    <x-landing.header />
                    <x-landing.hero />
                </div>
            </div>
            <x-landing.confessions />
        </div>
    </div>
</x-layout>
