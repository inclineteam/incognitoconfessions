@props(['confession'])

<div class="flex justify-center">
    <div class="flex flex-col w-full max-w-[95%]
xlg:max-w-[95%] 
rounded-xl bg-zinc-800/90">
        <div x-data="{ optionDropdown: false }" class="h-[15rem] flex flex-col">
            <div class="flex items-center justify-between pt-4 pl-5 pr-3">
                <a href="/confessions/{{ $confession->id }}"
                    class="font-medium text-zinc-300 hover:underline">{{ $confession->name }}</a>

                <div class="relative">
                    <button @click="optionDropdown = !optionDropdown"
                        x-bind:class="optionDropdown ? 'bg-zinc-700/30 text-zinc-300' : 'hover:bg-zinc-700/30 hover:text-zinc-300'"
                        class="rounded-full px-2 py-1 text-zinc-400">
                        <i class="ai-more-vertical-fill"></i>
                    </button>

                    <x-home.option-dropdown :confession="$confession" />
                </div>
            </div>
            <p class="ml-5 text-xs text-zinc-400">
                {{ Helper::fromNow($confession->created_at) }}
            </p>
            <div class="flex flex-col h-full px-5 py-6">
                <div class="flex h-[100%]">
                    <p class="mb-6 text-lg truncate break-all text-zinc-300">{{ $confession->content }}</p>
                </div>
                <div class="flex justify-between">
                    <div class="flex">
                        <p href="#comment" class="w-[4rem] rounded-full flex justify-center items-center mr-3 h-[1.7rem] font-thin text-[1rem] text-white/50 bg-[#373737]"><img src="/images/heart-2.png" class="p-1 h-[1.7rem]" />{{ $confession->reacts }}</img></p>
                        <p href="#comment" class="w-[4rem] rounded-full flex justify-center items-center h-[1.7rem] font-thin text-[1rem] text-white/50 bg-[#373737]"><img src="/images/message.png" class="p-1" />{{ count($confession->replies) }}</img></p>
                    </div>
                    <div>
                        <p class="text-sm text-zinc-400">{{ $confession->to }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div>
        </div>
    </div>
</div>
