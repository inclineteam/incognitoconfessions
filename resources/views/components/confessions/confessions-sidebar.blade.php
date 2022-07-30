<div class="flex flex-col bg-[#161515] w-[5rem] h-[100vh] sticky justify-between top-0 items-center">
    <div class="flex h-[8rem] w-[100%] items-center justify-center">
        <a href="/"><img src="images/ai-glass.png" class="h-[50px] w-[50px]"></a>
    </div>
    <div class="flex flex-col h-[75%]">
        @if (auth()->user())

            <div class="flex h-[5rem] w-[100%] items-center justify-center">
                <a href={{ route('home') }}><img src="images/home.png" class="h-[20px] w-[20px]"></a>
            </div>
            <div class="flex h-[5rem] w-[100%] items-center justify-center">
                <a href={{ route('confessions') }}><img src="images/letter.png" class="h-[20px] w-[20px]"></a>
            </div>
            
        @endif
        
    </div>
    <form class="mt-4 block" method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">
            <div class="flex h-[5rem] w-[100%] items-center justify-center">
                <img src="images/logout.png" class="h-[20px] w-[20px]">
            </div>
        </button>
    </form>
</div>