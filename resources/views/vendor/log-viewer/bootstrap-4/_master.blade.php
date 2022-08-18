<x-layout>
    <div class="h-auto min-h-screen bg-zinc-900">
        <div class="mx-auto max-w-[1400px]">
            <div class="bg-img relative bg-no-repeat [background-position:-20rem_-5rem] sm:bg-[top_right]">
                <div
                    class="absolute top-0 bottom-0 right-0 hidden w-20 bg-gradient-to-r from-zinc-900/0 via-zinc-900/20 to-zinc-900 lg:block">
                </div>
                <div class="bg-gradient-to-r from-zinc-900 via-zinc-900 to-zinc-900/0">
                    <x-admin-nav />
                </div>
            </div>


            <div>
                <div class="container-fluid">
                    <main role="main" class="pt-3">
                        @yield('content')
                    </main>
                </div>

                {{-- Scripts --}}
                <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

                @yield('modals')
                @yield('scripts')
            </div>
        </div>
    </div>
</x-layout>
