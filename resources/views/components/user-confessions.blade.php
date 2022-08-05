@props(["confessions" => $confessions])
<div class="h-[73%]">
    @if (count($confessions) > 0)
        @foreach ($confessions as $confession)
            <x-confession-card :confession="$confession" />
        @endforeach
    @else
        <div class="flex h-[100%] items-center justify-center">
            <p class="text-center text-2xl text-white/50">No confessions</p>
        </div>
    @endif
</div>