<x-layout>
    <div class="bg-shark h-auto min-h-screen p-6 text-white/50">
        @if (auth()->user())
            <p>Currently logged in as {{ auth()->user()->name }}</p>
            <p>Username: {{ auth()->user()->username }}</p>

            @if (auth()->user()->email_verified_at != null)
                <p class="text-emerald-400">Email verified: True</p>
            @else
                @if (session('status') == 'verification-link-sent')
                    <p class="mt-4 text-sm text-emerald-400">Verification link was sent!</p>
                @endif

                <p class="my-4">We noticed that your email is not verified yet, can u pweash vewify it? :3</p>
                <form class="mb-10" method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="rounded bg-sky-700 px-4 py-3 font-medium text-white">
                        Send Verification Link
                    </button>
                </form>
            @endif

            <form class="mt-4 block" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="rounded bg-rose-700 px-4 py-3 font-medium text-white">
                    Logout
                </button>
            </form>
        @else
            You are not logged in. <a href="{{ route('login') }}" class="text-sky-500">Login now</a>
        @endif
    </div>
</x-layout>
