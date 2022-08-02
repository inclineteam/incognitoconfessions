@extends('pages.home')
@section('content')

<div class="bg-shark flex justify-center h-auto min-h-screen p-6">

    @if (auth()->user())

        <div class="flex w-[90%] flex-col">
            <div class="flex p-5">
                <p class="text-2xl text-white text font-semibold">
                    Hello {{ Auth::user()->name }}
                    <br>
                    <span class="text-sm font-light opacity-40">welcome back</span>
                </p>
            </div>

            <div class="flex flex-col justify-between h-[100%]">
                <div class="bg-[#161515] flex w-[100%] h-[50%] p-5 rounded-md">
                    <img src="images/letter.png" class="h-[33px] w-[33px]">
                    <div class="w-[87%]">
                        <!-- gather all confessions of user -->
                        <x-user-confessions :confessions="$confessions" />
                        
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="rounded bg-[#3B50F9] w-[12rem] h-[3rem] text-sm font-normal text-white">
                            Create Confession
                        </button>
                    </div>
                </div>
                <div class="flex h-[60%] pt-5">

                    <div class="bg-[#161515] w-[30rem] h-[70%] rounded-md mr-5 p-5">
                        <img src="images/letter.png">
                    </div>

                    @if (auth()->user()->email_verified_at != null)
                           
                    @else
                        <div class="bg-[#161515] w-[25rem] rounded-md h-[50%] p-5">

                            @if (session('status') == 'verification-link-sent')
                                <p class="mt-4 text-sm text-emerald-400">Verification link was sent!</p>
                            @endif

                            <div class="flex items-center h-[100%]">
                                <div class="flex flex-col justify-center items-center">
                                    <p class="my-5 font-light text-white opacity-50">We noticed that your email is not verified yet can u pweash vewify it? :3</p>
                                    <form method="POST" action="{{ route('verification.send') }}">
                                        @csrf
                                        <button type="submit" class="rounded bg-[#FB4C41] px-4 py-3 text-sm font-normal text-white">
                                            Send Verification Link
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                            
                    @endif
                    
                </div>
            </div>
        </div>
        
    @else
        <div class="flex justify-center items-center">
            <img class="mr-4 opacity-50" src="images/letter.png"> <p class="text-white opacity-50"> You are not logged in  <a href="{{ route('login') }}" class="text-sky-500"> Login now</a></p>
        </div>
    @endif


</div>
@endsection