@extends('layouts.app')
@section('content')
    <div class="flex justify-center bg-zinc-900">
        @if (auth()->user())
            @if (auth()->user()->banned == true)
                <div class="flex flex-col items-center justify-center">
                    <img class="mr-4 opacity-50" src="images/letter.png">
                    <p class="text-white/50">You Are Banned</p>
                    <p class="p-2 text-sm font-extralight text-white opacity-30">
                        If you think this is a mistake please contact the developers
                    </p>
                </div>
            @else
                <div class="mx-1 w-full flex h-[100%] flex-col max-w-6xl">
                    <div class="mb-2 ml-5 flex items-center
                    justify-center
                    lg:justify-start
                    space-x-8 pb-4">
                        <div class="flex flex-col
                        lg:flex-row
                        items-center space-x-4">
                            @if (auth()->user()->email_verified_at != null)
                                <a href="{{ route('confession.create') }}">
                                    <button
                                        class="flex items-center space-x-2 xl:ml-0 lg:ml-0 md:ml-4 ml-4 sm:ml-4 rounded-md bg-indigo-900/20 px-4 py-3 font-medium hover:bg-indigo-900/30">
                                        <i class="ai-plus text-indigo-500"></i>
                                        <span class="text-indigo-400">Write a confession</span>
                                    </button>
                                </a>

                                <div class="flex items-center space-x-3 rounded px-4 py-3">
                                    {{-- <i class="ai-send text-zinc-500"></i> --}}
                                    <span class="text-zinc-400">You've made {{ $confessions->count() }} @if (count($confessions) > 1)
                                            confessions
                                        @else
                                            confession
                                        @endif
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>

                    @if (count($confessions) > 0)
                        <p class="mb-6 ml-5 text-xl font-medium text-center
                        lg:text-start
                        text-zinc-300">Your confessions</p>
                        <x-home.conditional-columns :items="$confessions">
                            @foreach (auth()->user()->confessions as $confession)
                                <x-home.confession-card :confession="$confession" />
                            @endforeach
                        </x-home.conditional-columns>
                    @else
                        @if (auth()->user()->email_verified_at != null)
                            <div class="pt-10 text-center">
                                <p class="mb-10 text-2xl font-medium text-zinc-400">You haven't wrote a confession</p>
                                <a href="{{ route('confession.create') }}"
                                    class="mx-auto block w-max rounded border border-zinc-800 px-4 py-3 font-medium text-indigo-400 hover:bg-zinc-800/20">
                                    Write one
                                </a>
                            </div>
                        @else
                            <div class="pt-10 text-center">
                                <p class="mb-10 text-2xl font-medium text-zinc-400">Please Verify your Email</p>
                            </div>
                        @endif
                    @endif
                </div>
            @endif
        @else
            <div class="flex items-center justify-center pt-10">
                <img class="mr-4 opacity-50" src="images/letter.png">
                <p class="text-lg text-white"> You are not logged in.
                    <a href="{{ route('login') }}" class="text-indigo-400">
                        Login now
                    </a>
                </p>
            </div>
        @endif
    </div>
@endsection
