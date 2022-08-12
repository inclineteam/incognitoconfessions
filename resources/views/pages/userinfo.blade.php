@extends('pages.home')
@section('content')

<div id="data-holder" x-data="{ modal: false }" x-init="{ modal = $persist(false) }"  class="bg-shark flex justify-center h-auto min-h-screen p-6">

    @if (auth()->user())    

        @if(auth()->user()->banned == 1)

            <div class="flex justify-center flex-col items-center">
                <img class="mr-4 opacity-50" src="images/letter.png"><p class="text-white/50">You Are Banned</p>
                <p class="text-sm text-white opacity-30 font-extralight p-2">If you think this is a mistake please contact the developers</p>
            </div>

        @else

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
                            <div class="ml-5">
                                <p class="text-white font-medium py-1 text-lg">Confessions</p>
                            </div>
                            <x-user-confessions :confessions="$confessions" />
                            <div class="text-white flex items-end justify-center">
                                
                                {{ $confessions->links("pagination::custom") }}
                                
                            </div>
                            
                            
                        </div>
                        <div class="flex items-end">
                            <button type="submit"  @click="modal = true" class="rounded bg-[#3B50F9] w-[12rem] h-[3rem] text-sm font-normal text-white">
                                Create Confession
                            </button>
                        </div>
                    </div>
                    <div class="flex h-[60%] pt-5">

                        <div class="bg-[#161515] flex w-[30rem] h-[70%] rounded-md mr-5 p-5">
                            <img src="images/letter.png" class="h-[33px] w-[33px]">
                            <div class="flex flex-col h-[100%] w-[100%] justify-center items-center">
                                <p class="text-white text-[3.4rem]">{{ count($all) }}</p>
                                <span class="text-white opacity-40">confessions has been created</span>
                            </div>
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

        @endif

        
        
    @else
        <div class="flex justify-center items-center">
            <img class="mr-4 opacity-50" src="images/letter.png"> <p class="text-white opacity-50"> You are not logged in  <a href="{{ route('login') }}" class="text-sky-500"> Login now</a></p>
        </div>
    @endif

    <x-modal.confess/>


</div>
@endsection