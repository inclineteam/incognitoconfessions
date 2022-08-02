<div id="confessions" class="pt-16 pb-56">
=======
@props(["confessions" => $confessions])

<div class="-mt-20 pb-56">
    <div class="relative">
        <div class="absolute top-0 right-0 h-20 w-96 bg-gradient-to-b from-[#1B1C21]/0 to-[#1B1C21]"></div>

        <div class="relative mx-auto max-w-6xl columns-3 gap-6">

            @if (count($confessions) > 0)
            
                @foreach ($confessions as $confession)
                    <x-landing.confession-card :confession="$confession" :date="Carbon\Carbon::parse($confession->created_at)->format('m/d/y')"/>
                @endforeach
                
            @endif

        </div>

        <div
            class="absolute bottom-0 flex h-96 w-full items-end justify-center bg-gradient-to-b from-[#1B1C21]/0 via-[#1B1C21]/80 to-[#1B1C21] pb-20">
            <a href={{ route('confessions') }} class="bg-[#3B50F9] rounded-md px-6 py-4 font-medium text-white">View all confessions</a>
        </div>
    </div>
</div>
