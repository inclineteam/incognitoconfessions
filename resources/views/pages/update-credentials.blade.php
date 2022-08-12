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
                <div class="flex flex-col w-[100%] h-[75vh] opacity-30 items-center justify-center">
                    <div class="bg-zinc-800/90 flex w-[94%] mx-8 h-[100%] rounded-lg">
                        <div>

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
