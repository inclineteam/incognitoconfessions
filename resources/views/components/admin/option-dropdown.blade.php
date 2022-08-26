@props(['key' => $key])

<div class="absolute right-0 z-40 mt-2 w-max space-y-1 rounded-lg border border-zinc-800 bg-zinc-900 p-2 shadow-xl shadow-zinc-900"
    @click.outside="optionDropdown = false" x-show="optionDropdown" x-cloak x-transition>
    <a href="{{ route('log-viewer::logs.show', [$key]) }}">
        <button
            class="group flex w-full items-baseline space-x-4 rounded-md py-2 pl-4 pr-6 duration-150 hover:bg-zinc-800/70 focus:bg-zinc-800">
            <i class="ai-pencil text-zinc-500 group-hover:text-zinc-400"></i>
            <span class="text-sm font-medium text-zinc-400 group-hover:text-zinc-300">
                Open Log
            </span>
        </button>
    </a>
    <a href="{{ route('log-viewer::logs.download', [$key]) }}">
        <button
            class="group flex w-full items-baseline space-x-4 rounded-md py-2 pl-4 pr-6 duration-150 hover:bg-zinc-800/70 focus:bg-zinc-800">
            <i class="ai-pencil text-zinc-500 group-hover:text-zinc-400"></i>
            <span class="text-sm font-medium text-zinc-400 group-hover:text-zinc-300">
                Download
            </span>
        </button>
    </a>
    <div class="modal-dialog" role="document">
        <form id="delete-log-form" action="{{ route('log-viewer::logs.delete') }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="date" value="{{ $key }}">
            <button
            class="group flex w-full items-baseline space-x-4 rounded-md py-2 pl-4 pr-6 duration-150 hover:bg-zinc-800/70 focus:bg-zinc-800">
            <i class="ai-pencil text-zinc-500 group-hover:text-zinc-400"></i>
            <span class="text-sm font-medium text-zinc-400 group-hover:text-zinc-300">
                Delete
            </span>
        </button>
        </form>
    </div>
</div>
