<div class="flex justify-center p-8">
    <div class="bg-[#111111] h-[4rem] w-[57em] rounded-md flex justify-center items-center">
        <!-- implement search bar -->
        <div class="bg-[#25262B] w-[55rem] h-[75%] rounded-md opacity-75">
            <div class="flex items-center w-[100%] justify-evenly h-[100%]">
                <form class="w-[87%] flex" >
                    <input type="text" placeholder="Search for a name" class="bg-transparent text-white p-4 w-[100%] select-none opacity-50 font-inter">
                    <div class="flex justify-center items-center ">
                        <button type="submit"><img src="images/search.png" class="h-[25px] w-[25px] opacity-50"/></button>
                    </div>
                    
                </form>
                <div class="flex h-[100%] w-[8%] justify-center items-center ">
                    <img src="images/filter.png" class="w-[64px] h-[22px]">
                </div>
            </div>
        </div>
        
    </div>
    @if(!auth()->user())
        <div class="w-[15rem] justify-end flex items-center">
            <a href={{ route('register') }} class="p-4 bg-[#3B50F9] w-[12rem] text-center rounded-md text-[#ffffff] font-medium">Sign In | Sign Up</a>
        </div>
        
    @endif
</div>