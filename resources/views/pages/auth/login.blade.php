<x-auth-layout title="Log in">
    <form method="POST" action="{{ route('login') }}" class="px-8 pt-8">
        @csrf

        <div class="mb-6">
            <x-form.control-with-icon type="email" label="Email Address" name="email" icon="ai-envelope" />
        </div>

        <div class="mb-6">
            <x-form.control-with-icon type="password" label="Password" name="password" icon="ai-lock-on" />
        </div>

        <div class="my-6 flex items-center space-x-2">
            <input type="checkbox" name="remember" id="remember_me" class="checkbox-input hidden" />
            <label for="remember_me"
                class="custom-checkbox flex h-4 w-4 cursor-pointer items-center justify-center rounded border border-white/20 text-transparent duration-200">
                <i class="ai-check text-xs"></i>
            </label>
            <label for="remember_me"
                class="cursor-pointer select-none text-sm text-white/50 hover:text-white/80">Remember me</label>
        </div>

        <div>
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display(['data-theme' => 'dark']) !!}
        </div>

        <div class="mt-4 space-y-8">
            <button type="submit"
                class="w-full rounded border-t border-indigo-500 bg-indigo-600 py-3 px-4 font-medium text-white duration-150">
                Continue
            </button>
            <div class="flex items-center justify-between">
                <a href="{{ route('register') }}" class="flex text-sm text-zinc-400 hover:text-zinc-300">
                    Create an account
                </a>
                <a href="{{ route('password.email') }}" class="flex text-sm text-zinc-400 hover:text-zinc-300">
                    Forgot password
                </a>
            </div>
        </div>
    </form>
    <div class="px-8 pb-8">
        <div class="relative my-10 border-t border-zinc-700">
            <span
                class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 bg-zinc-800 p-2 text-sm text-zinc-500">OR</span>
        </div>
        <div class="space-y-4">
            <x-form.oa-button provider="github">
                <i class="ai-github-fill justify-self-end text-lg"></i>
                <span class="justify-self-start">Github</span>
            </x-form.oa-button>
            <x-form.oa-button provider="facebook">
                <i class="ai-facebook-fill justify-self-end text-lg text-blue-400"></i>
                <span class="justify-self-start">Facebook</span>
            </x-form.oa-button>
            <x-form.oa-button provider="google">
                <i class="ai-google-fill justify-self-end text-lg text-emerald-400"></i>
                <span class="justify-self-start">Google</span>
            </x-form.oa-button>
        </div>
    </div>
</x-auth-layout>
