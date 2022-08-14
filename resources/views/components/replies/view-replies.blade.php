<div class="flex overflow-auto w-full h-full flex-col mt-5">
    @foreach ($confession->replies as $reply)
        <x-replies.view-replies-card :reply="$reply" />
    @endforeach
</div>