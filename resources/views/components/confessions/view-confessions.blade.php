@props(["confessions" => $confessions])

<div class="flex flex-col  items-center">
    <div class="relative mx-auto max-w-6xl columns-3 gap-6">

        @if (count($confessions) > 0)
        
            @foreach ($confessions as $confession)
                <x-confessions.view-confession-card :confession="$confession" :date="Carbon\Carbon::parse($confession->created_at)->format('m/d/y')"/>
            @endforeach
            
        @endif
    
    </div>
    <div class="text-white justify-center flex w-[100%] p-3">
        {{ $confessions->links('vendor.pagination.custom') }}
    </div>
</div>