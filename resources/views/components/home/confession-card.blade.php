@props(['confession'])

<div class="relative mb-6 block w-full max-w-xs rounded-xl bg-zinc-800/90">
    <div x-data="{ optionDropdown: false }">
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
        <div class="px-5 py-6">
            <p class="mb-6 text-lg text-zinc-300">{{ $confession->content }}</p>

            <div class="flex justify-end">
                <p class="text-sm text-zinc-400">{{ $confession->to }}</p>
            </div>
        </div>
    </div>

    <div>
    </div>
</div>
