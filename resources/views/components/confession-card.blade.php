@props(["confession" => $confession])
<div class="flex ml-5">
    <div class="flex justify-center w-[90%] bg-[#313131] rounded-lg">
        <p class="text-white text font-semibold p-3">
            {{ $confession->name }}
        </p>
        <p class="text-white p-4 opacity-40 w-[50%] text-sm  truncate">
            {{ $confession->content }}
        </p>
        <div class="flex justify-end w-[30%]">
            <form>
                <button type="submit" class="rounded mr-3 bg-[#3B50F9] w-[5rem] h-[3rem] text-sm font-normal text-white">
                    Edit
                </button>
            </form>
            <form method="POST" action="/confessions/delete/{{ $confession->id }}">
                @csrf
                @method("delete")
                <button type="submit" class="rounded bg-[#FB4C41] w-[5rem] h-[3rem] text-sm font-normal text-white">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>