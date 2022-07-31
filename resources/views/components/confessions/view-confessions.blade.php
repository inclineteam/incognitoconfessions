@props(['confessions' => $confessions])

<div>
    <!-- TODO -->

    <div class="flex h-[250vh] flex-col">

        @if (count($confessions) > 0)
            @if (count($confessions) <= 3)
                <div class="relative mx-auto flex max-w-6xl columns-3 items-start gap-6">
                    @foreach ($confessions as $confession)
                        <x-confessions.view-confession-card :confession="$confession" />
                    @endforeach
                </div>
            @else
                <div class="relative mx-auto max-w-6xl columns-3 gap-6">
                    @foreach ($confessions as $confession)
                        <x-confessions.view-confession-card :confession="$confession" />
                    @endforeach
                </div>
            @endif
        @else
            <p class="text-center text-3xl text-white/50">No confessions found</p>
        @endif

        <div class="flex w-[100%] justify-center text-white">
            {{ $confessions->links('vendor.pagination.custom') }}
        </div>
    </div>

</div>
