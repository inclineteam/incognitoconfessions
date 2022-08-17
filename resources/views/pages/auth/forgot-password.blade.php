<x-auth-layout title="Forgot password">
    <form method="POST" action="{{ route('password.email') }}" class="p-8">
        @csrf

        @if (session('status'))
            <p class="mb-8 text-sm text-emerald-400">{{ session('status') }}</p>
        @endif

        <!-- Email Address -->
        <div>
            <x-form.control label='Email Address' name='email' />
        </div>

        <div class="my-5">
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display(['data-theme' => 'dark']) !!}
        </div>

        <button type="submit"
            class="w-max rounded border-t border-indigo-500 bg-indigo-600 py-3 px-4 font-medium text-white duration-150">
            Send Link
        </button>
    </form>
</x-auth-layout>
