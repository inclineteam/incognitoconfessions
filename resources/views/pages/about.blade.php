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
            <section class="responsive-padding relative mx-auto w-full max-w-4xl py-8 text-white">
            <h1 class="font-medium text-4xl text-start py-6">About Us</h1>
            <p class="text-3xl text-justify font-extralight">
                Our mission is to provide a platform for
                people to vent out there feelings in incognito mode!
                <br> <br>
                Share your weirdest and darkest secrets anonymously,
                and receive feedbacks from other users.
            </p>
            <br><br>
            <p class="text-3xl text-start font-extralight">
                Moreover, Incognito Confessions is a Laravel test and starter built by
                Incline Start-up Agency for future team project.
                Testing Git and framework functions.
                <br> <br>
                In addition, anyone is open to use this laravel template for
                personal and commercial use.
            </p>
        </section>
        </div>
    </div>
</x-layout>
