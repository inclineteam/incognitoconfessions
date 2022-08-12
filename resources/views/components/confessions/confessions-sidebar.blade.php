<div class="flex bg-[#161515] h-[5rem] items-center">
    <div class="flex h-[6rem] w-[7rem] items-center justify-center">
        <a href="/"><img src="images/ai-glass.png" class="h-[50px] w-[50px]"></a>
    </div>
    @if (Route::current()->getName() == "confessions")
        <div class="flex flex-row w-[28%]">
            @if (auth()->user())

                <div class="flex text-white w-[10rem] h-[5rem] items-center justify-center">
                    <a class="flex items-center" href={{ route('home') }}><img src="images/home.png" class="h-[20px] w-[20px]"><span class="opacity-75 ml-2">Home</span></a>
                </div>
                <div class="flex w-[10rem] h-[5rem] items-center justify-center">
                 <div class="bg-[#292A2F] text-white w-[400px] h-[50px] rounded-xl flex justify-center items-center">
                    <a class="flex items-center" href={{ route('confessions') }} ><img src="images/letter.png" class="h-[20px] w-[20px]"><span class="opacity-75 ml-2">Confessions</span></a>
                 </div>
                </div>
                
            @endif
        </div>
        <x-confessions.confessions-searchbar />
    @else
        <div class="flex flex-row w-[90%]">
            @if (auth()->user())

                <div class="flex w-[10rem] h-[5rem] items-center justify-center">
                    <div class="bg-[#292A2F] text-white w-[120px] h-[50px] rounded-xl flex justify-center items-center">
                        <a class="flex items-center" href={{ route('confessions') }} ><img src="images/home.png" class="h-[20px] w-[20px]"><span class="opacity-75 ml-2">Home</span></a>
                    </div>
               </div>
                <div class="flex w-[10rem] h-[5rem] items-center justify-center">
                    <div class=" text-white w-[400px] h-[50px] rounded-xl flex justify-center items-center">
                        <a class="flex items-center" href={{ route('confessions') }} ><img src="images/letter.png" class="h-[20px] w-[20px]"><span class="opacity-75 ml-2">Confessions</span></a>
                    </div>
                </div>
                
            @endif
        </div>
    @endif
    
    
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">
            <div class="flex h-[5rem] w-[15rem] items-center p-4 justify-center">
                <img src="images/logout.png" class="h-[20px] w-[20px]">
                @if (auth()->user())
                    <span class="text-white ml-2">Logout</span>
                @else
                    <span class="text-white ml-2">Log In / Sign Up</span>
                @endif
            </div>
        </button>
    </form>
</div>