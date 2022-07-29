<div x-show="modal" @click="modal = false"
    class="fixed inset-0 z-40 flex h-auto min-h-screen justify-center overflow-y-auto bg-black/90 pt-20" x-cloak>
    <div onclick="event.stopPropagation()" x-show="modal" class="h-max w-full max-w-4xl rounded-lg bg-[#1B1C21] shadow-xl"
        x-transition.duration.250ms>
        <header class="px-8 pt-6 text-2xl font-semibold text-white/80">Sign in</header>

        <div class="flex">
            <div class="flex-1">
                <form method="POST" action="{{ route('login') }}" @submit="modal = true" class="p-8">
                    @csrf
                    <x-form.control label="Email or Username" name="login" class="mb-6"
                        inputBg="bg-shark-lighter" />
                    <x-form.control type="password" label="Password" name="password" class="mb-6"
                        inputBg="bg-shark-lighter" />

                    <div class="mb-8 mt-4 flex items-center space-x-2">
                        <input type="checkbox" name="remember" id="remember_me" class="checkbox-input hidden" />
                        <label for="remember_me"
                            class="custom-checkbox flex h-4 w-4 cursor-pointer items-center justify-center rounded border border-white/20 text-transparent duration-200">
                            <i class="ai-check text-xs"></i>
                        </label>
                        <label for="remember_me"
                            class="cursor-pointer select-none text-sm text-white/50 hover:text-white/80">Remember
                            me</label>
                    </div>

                    <button type="submit" class="bg-primary w-full rounded py-3 font-medium text-white">
                        Continue
                    </button>
                </form>

                <div class="my-4 flex items-center justify-between px-8 pb-4 text-sm text-white/50">
                    <a href="{{ route('register') }}" class="hover:text-white/80">Create new account</a>
                    <a href="{{ route('password.email') }}" class="hover:text-white/80">Forgot password</a>
                </div>
            </div>

            <div class="my-8 border-l border-white/10"></div>

            <div class="flex-1 p-8">
                <p class="mb-10 text-center text-xl font-medium text-white/80">...Or use your other accounts</p>
                <div class="space-y-4">
                    <x-form.oa-button provider="github"
                        class="border-slate-500/20 text-slate-200 hover:bg-slate-500/20">
                        <i class="ai-github-fill text-xl"></i>
                        <span>
                            Sign in with GitHub
                        </span>
                    </x-form.oa-button>
                    <x-form.oa-button provider="facebook" class="border-sky-500/20 text-sky-400 hover:bg-sky-500/20">
                        <i class="ai-facebook-fill text-xl"></i>
                        <span>
                            Sign in with Facebook
                        </span>
                    </x-form.oa-button>
                    <x-form.oa-button provider="google"
                        class="border-emerald-500/20 text-emerald-400 hover:bg-emerald-500/20">
                        <i class="ai-google-fill text-xl"></i>
                        <span>
                            Sign in with Google
                        </span>
                    </x-form.oa-button>
                </div>
            </div>
        </div>
    </div>
</div>
