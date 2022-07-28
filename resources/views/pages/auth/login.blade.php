<x-auth-layout title="Log in">
    <form method="POST" action="{{ route('login') }}" class="p-8">
        @csrf

        <div class="mb-6">
            <x-form.control label="Email or Username" name="login" />
        </div>

        <div class="mb-6">
            <x-form.control-with-icon type="password" label="Password" name="password" icon="ai-lock-on" />
        </div>

        <div class="my-4 flex items-center space-x-2">
            <input type="checkbox" name="remember" id="remember_me" class="checkbox-input hidden" />
            <label for="remember_me"
                class="custom-checkbox flex h-4 w-4 cursor-pointer items-center justify-center rounded border border-white/20 text-transparent duration-200">
                <i class="ai-check text-xs"></i>
            </label>
            <label for="remember_me"
                class="cursor-pointer select-none text-sm text-white/50 hover:text-white/80">Remember me</label>
        </div>


        <div class="flex justify-end">
            <a href="{{ route('password.email') }}" class="flex text-sm text-white/50 hover:text-white/80">
                Forgot password
            </a>
        </div>

        <div class="mt-4 space-y-8">
            <button type="submit"
                class="bg-primary hover:bg-primary/70 w-full rounded py-3 px-4 font-medium text-white duration-150">
                Continue
            </button>

            <p class="text-white/50">Don't have an account?
                <a href="{{ route('register') }}" class="text-white/80 underline-offset-2 hover:underline">Create
                    one</a>
            </p>
        </div>
    </form>
</x-auth-layout>
