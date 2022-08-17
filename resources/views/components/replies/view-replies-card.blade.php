@props(['reply' => $reply])

@if (auth()->user())
    @if (auth()->user()->id == $reply->user_id)
        <div id="#reply-{{ $reply->id }}" class="flex justify-end">
            <div class="flex justify-end items-end mr-5 sm:mr-7 md:mr-8 lg:mr-9 xl:mr-10 rounded-xl mt-5 flex-col w-auto min-w-[15%] max-w-[70%] bg-zinc-700">
                <div class="p-3">
                    <div class="flex flex-row-reverse">
                        <form action="/confessions/reply/{{ $reply->id }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="w-[2rem] rounded-full flex justify-end h-[1.5rem] font-thin text-[1rem] text-white/50"><img src="/images/delete.png" class="h-[1.5rem] w-[1.5rem]" /></img></button>
                        </form>
                        <p class="text-white flex items-center text-[0.9rem] text-end">Anonymous - <span class="text-[0.6rem] ml-1">{{ $reply->user_id }}</span></p>

                    </div>
                    
                    <div class="flex justify-end">
                        <p class="text-white font-[350] text-[0.9rem] mr-8 break-all opacity-40">{{ $reply->content }}</p>
                    </div>
                </div>
            </div>
        </div>

    @else
        <div class="flex justify-start">
            <div class="flex justify-start items-start ml-10 rounded-xl mt-5 flex-col w-auto max-w-[70%] bg-zinc-700">
                <div class="p-3">
                    <p class="text-white text-start">Anonymous - {{ $reply->user_id }}</p>
                    <div>
                        <p class="text-white font-[350] opacity-40">{{ $reply->content }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
@else
    <div class="flex justify-start">
        <div class="flex justify-start items-start ml-10 rounded-xl mt-5 flex-col w-auto max-w-[70%] bg-zinc-700">
            <div class="p-3">
                <p class="text-white text-start">Anonymous - {{ $reply->user_id }}</p>
                <div>
                    <p class="text-white font-[350] opacity-40">{{ $reply->content }}</p>
                </div>
            </div>
        </div>
    </div>
@endif