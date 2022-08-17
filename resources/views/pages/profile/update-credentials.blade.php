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
                <!--TODO Update User Credentials-->
                <div class="flex flex-col w-[100%] h-[70vh] items-center justify-center">
                    <div class="bg-zinc-800/90 flex w-[90%] sm:w-[80%] md:w-[70%] lg:w-[60%] items-center mx-8 h-[100%] justify-center rounded-lg">
                        <div>
                            <p class="text-white font-medium font-inter pt-4 pl-4 text-[2rem] sm:text-[2.5rem] md:text-[3.5rem] capitalize leading-[3.8rem]">{{ auth()->user()->name }}</p>
                            <form method="POST" action="{{ route('profile.edit') }}" class=" mx-4 flex flex-col">
                                @csrf
                                @method('PUT')
                                <p class="text-xl font-medium text-zinc-300 mb-7">Update User Profile</p>
                                <x-form.control class="w-[100%]" name="old" label="Old Password" inputBg="bg-zinc-700 mb-1"  />
                                <x-form.control class="w-[100%]" name="new" label="New Password" inputBg="bg-zinc-700 mb-1"  />
                                <div class="my-8">
                                    {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display(['data-theme' => 'dark']) !!}
                                </div>
                                <div class="space-x-2">
                                    <button type="submit"
                                        class="rounded-lg border-t border-indigo-500 bg-indigo-600 px-5 py-3 font-medium text-white">
                                        Update
                                    </button>
                                    <a href="{{ route('home') }}">
                                        <button type="button"
                                            class="rounded-lg border-t border-zinc-700 bg-zinc-800 px-5 py-3 font-medium text-zinc-300">
                                            Back
                                        </button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
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
