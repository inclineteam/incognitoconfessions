@props(["confession" => $confession])

<div x-show="modal1" @click="modal1 = false"
    class="fixed inset-0 z-40 flex h-auto min-h-screen justify-center items-center overflow-y-auto bg-black/90 pt-20" x-cloak>
    <div onclick="event.stopPropagation()" x-show="modal1" class="h-max w-full max-w-4xl rounded-lg bg-[#1B1C21] shadow-xl"
        x-transition.duration.250ms>
        <header class="px-8 pt-6 text-2xl font-semibold text-white/80">Edit Confession</header>

        <div class="flex">
            <div class="flex-1">
                <form method="POST" action="/confessions/edit/{{ $confession->id }}" @submit="modal1 = false" class="p-8">
                    @csrf
                    @method("patch")
                    <p class="text-[#ffffff] mb-2 mt-5 opacity-50"><label for="content" >Name</label></p>
                    <input value="{{ $confession->name }}" class="rounded  p-3 font-medium text-white bg-shark-lighter w-[100%] h-[2.5rem]" label="Name" name="name" class="mb-6"
                        inputBg="bg-shark-lighter" />
                    <br>
                    <p class="text-[#ffffff] mb-2 mt-5 opacity-50"><label for="content" >To</label></p>
                    <input value="{{ $confession->to }}" class="rounded  p-3 font-medium text-white bg-shark-lighter w-[100%] h-[2.5rem]" label="To" name="to" class="mb-6"
                        inputBg="bg-shark-lighter" />
                    <p class="text-[#ffffff] mb-3 mt-5 opacity-50"><label for="content" >Message</label></p>
                    <textarea name="content" class="w-[100%] rounded resize-none text-white p-3 text-normal h-[10rem] bg-shark-lighter">{{ $confession->content }}</textarea>

                    <div class="flex justify-center">
                        <button label= type="submit" class="bg-[#3B50F9] mt-4 w-[10rem] rounded py-3 font-medium text-white">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
