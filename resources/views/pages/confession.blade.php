@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="bg-zinc-800/90 w-[95%] md:w-[75%] lg:w-[70%] h-[100%] rounded-lg">
            <div class="flex">
                <p class="text-white p-8 ml-5">{{ $confession->name }}</p>
            </div>
            <div class="flex justify-center">
                <hr class=" w-[90%] opacity-30">
            </div>
            <div class="flex w-[95%]">
                <p class="text-white font-light opacity-30 p-3 ml-9">{{ $confession->content }}</p>
            </div>
            <div class="flex">
                <p class="text-white p-5 ml-8">To {{ $confession->to }}</p>
            </div>
            <div class="flex p-8 ml-5 ">
                <form method="POST" action="/confessions/{{ $confession->id }}" class="flex">
                    @csrf
                    @method("PUT")
                    @if (in_array(auth()->user()->id, $confession->reacts_users))
                    <button class="w-[4rem] rounded-full flex justify-center h-[1.5rem] font-thin text-[1rem] text-white/50 bg-[#616161]"><img src="/images/heart.png" class="p-1" />{{ $confession->reacts }}</img></button>
                    @else
                    <button class="w-[4rem] rounded-full flex justify-center h-[1.5rem] font-thin text-[1rem] text-white/50 bg-[#373737]"><img src="/images/heart.png" class="p-1" />{{ $confession->reacts }}</img></button>
                    @endif
                    
                </form>
                <a href="#comment" class="w-[4rem] rounded-full flex justify-center h-[1.5rem] ml-3 font-thin text-[1rem] text-white/50 bg-[#373737]"><img src="/images/message.png" class="p-1" />{{ count($confession->replies) }}</img></a>
            </div>
            <div class="flex justify-center">
                <hr class=" w-[90%] opacity-30">
            </div>
            <div class="h-full min-h-[80%]">
                <div class="flex justify-center">
                    <!-- implement replies section -->
                    <x-replies.view-replies :confession="$confession" />
                </div>
                <div class="h-[5rem] flex justify-center" id="comment">
                    <form method="POST" action="/confessions/{{ $confession->id }}/reply" class="flex items-center w-[100%] justify-center">
                        @csrf
                        @method("POST")
                        <input type="text" name="content" class="w-[80%] p-3 h-[2rem] rounded-full flex justify-center font-thin text-[1rem] text-white/50 bg-[#373737]" placeholder="Reply to this confession" />
                        <button class="w-[4rem] rounded-full flex justify-center h-[2rem] ml-3 items-center font-thin text-[1rem] text-white/50 bg-[#373737]"><img src="/images/message.png" class="p-1" /></img></button>
                    </form>
                </div>
            </div>
            
        </div>
        
    </div>
@endsection
