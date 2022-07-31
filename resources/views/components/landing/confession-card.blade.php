@props(['confession'])

<div class="relative mb-6 inline-block w-full overflow-hidden rounded-lg bg-[#25262B] p-6">
    <img src="/images/quote.svg" alt="" class="absolute -top-10 left-0 h-36 w-36 select-none" />

    <div class="flex h-[4rem] items-center justify-between text-sm">
        <p class="font-medium text-white/50">{{ $confession->name }}</p>
    </div>
    <p class="relative mb-16 whitespace-pre-wrap text-lg italic text-white/80">{{ $confession->content }}</p>

    <div class="flex items-center justify-between text-sm">
        <p class="font-medium text-white/50">{{ $confession->to }}</p>

        <span class="text-white/30">{{ Carbon\Carbon::parse($confession->created_at)->format('m/d/y') }}</span>
    </div>
</div>
