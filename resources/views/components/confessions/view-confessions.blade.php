@props(['confessions' => $confessions])

<div>
    <!-- TODO -->
    <div class="flex flex-col mx-4">
        @if (count($confessions) > 0)
            @if (count($confessions) <= 3)
                <div class="flex w-full items-start justify-center gap-6">
                    @foreach ($confessions as $confession)
                        <x-confessions.view-confession-card :confession="$confession" />
                    @endforeach
                </div>
            @else
                <div class="grid place-items-center items-center gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($confessions as $confession)
                        <x-confessions.view-confession-card :confession="$confession" />
                    @endforeach
                </div>
            @endif
        @else
            <p class="text-center text-2xl text-white/50">No confessions found</p>
        @endif

        <div class="flex w-full justify-center pb-10 pt-20 text-white">
            {{ $confessions->links('vendor.pagination.custom') }}
        </div>
    </div>

</div>
