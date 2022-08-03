@props(["confession" => $confession])
<div id="data-holder1" x-data="{ modal1: false }" x-init="{ modal1 = $persist(false) }" class="flex ml-5 my-3">
    <div class="flex justify-center w-[90%] bg-[#313131] rounded-lg">
        <p class="text-white text w-[7rem] truncate font-semibold p-3">
            {{ $confession->name }}
        </p>
        <p class="text-white p-4 opacity-40 w-[50%] text-sm  truncate">
            {{ $confession->content }}
        </p>
        <div class="flex justify-end w-[30%]">
            
            <button type="submit" @click="modal1 = true" class="mr-3">
                <div class="flex h-[3.2rem] items-center">
                    <img src="images/edit.png">
                </div>
            </button>
            </form>
            <form method="POST" action="/confessions/delete/{{ $confession->id }}">
                @csrf
                @method("delete")
                <button type="submit">
                    <div class="flex h-[3.2rem] items-center">
                        <img src="images/delete.png">
                    </div>
                </button>
            </form>
        </div>
    </div>
    <x-modal.edit :confession="$confession"/>
</div>