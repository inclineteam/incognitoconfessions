<x-auth-layout title="Sign up">
    <form method="POST" action="{{ route('register') }}" class="p-8">
        @csrf

        <div class="mb-6">
            <x-form.control-with-icon label='Name' name="name" icon="ai-person" />
        </div>

        <div class="mb-6">
            <x-form.control-with-icon type="email" label="Email Address" name="email" icon="ai-envelope" />
        </div>

        <div class="mb-6 flex items-center space-x-6">
            <x-form.control type="password" label="Password" name="password" />
            <x-form.control type="password" label="Confirm" name="password_confirmation" />
        </div>

        <div class="mb-5 mt-14">
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display(['data-theme' => 'dark']) !!}
        </div>

        <div class="space-y-8">
            <button type="submit" class="w-full rounded bg-indigo-500 py-3 px-4 font-medium text-white duration-150">
                Create Account
            </button>

            <p class="text-white/50">Already have an account?
                <a href="{{ route('login') }}" class="text-white/80 underline-offset-2 hover:underline">Login
                    instead</a>
            </p>
        </div>
    </form>
</x-auth-layout>
