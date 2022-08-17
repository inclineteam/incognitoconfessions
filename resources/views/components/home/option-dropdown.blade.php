@props(['confession'])

<div class="absolute right-0 z-40 mt-2 w-max space-y-1 rounded-lg border border-zinc-800 bg-zinc-900 p-2 shadow-xl shadow-zinc-900"
    @click.outside="optionDropdown = false" x-show="optionDropdown" x-cloak x-transition>
    <a href="/confessions/{{ $confession->id }}/edit">
        <button
            class="group flex w-full items-baseline space-x-4 rounded-md py-2 pl-4 pr-6 duration-150 hover:bg-zinc-800/70 focus:bg-zinc-800">
            <i class="ai-pencil text-zinc-500 group-hover:text-zinc-400"></i>
            <span class="text-sm font-medium text-zinc-400 group-hover:text-zinc-300">
                Edit Confession
            </span>
        </button>
    </a>
    <form method="POST" action="/confessions/{{ $confession->id }}/delete">
        @csrf
        @method('DELETE')
        <button
            class="group flex w-full items-baseline space-x-4 rounded-md py-2 pl-4 pr-6 duration-150 hover:bg-zinc-800/70 focus:bg-zinc-800">
            <i class="ai-trash-can text-zinc-500 group-hover:text-zinc-400"></i>
            <span class="text-sm font-medium text-zinc-400 group-hover:text-zinc-300">
                Delete Confession
            </span>
        </button>
    </form>
</div>
