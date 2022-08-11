<x-auth-layout title="Reset password">
    <form method="POST" action="{{ route('password.update') }}" class="p-8">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="mb-6">
            <x-form.control label="Email Address" name='email' />
        </div>

        <div class="mb-6 flex items-center space-x-4">
            <x-form.control type="password" label="Password" name="password" />
            <x-form.control type="password" label="Confirm" name="password_confirmation" />
        </div>

        <div class="my-5">
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display(['data-theme' => 'dark']) !!}
        </div>

        <div>
            <button type="submit"
                class="w-max rounded border-t border-indigo-500 bg-indigo-600 py-3 px-4 font-medium text-white duration-150">
                Reset Password
            </button>
        </div>
    </form>
</x-auth-layout>
