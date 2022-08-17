@props(['confession'])

<div class="relative mb-6 inline-block w-full overflow-hidden rounded-lg bg-zinc-800/90 p-6">
    <img src="/images/quote.svg" alt="" class="absolute -top-10 left-0 h-36 w-36 select-none" />

    <div class="flex items-center justify-between pt-6 pb-2 lg:pb-6 text-sm">
        <p class="font-medium text-zinc-400">{{ $confession->name }}</p>
    </div>
    <p class="relative mb-8 whitespace-pre-wrap text-base italic text-zinc-200 md:mb-12 lg:mb-16 lg:text-lg">
{{ $confession->content }}
    </p>

    <div class="flex items-center justify-between text-sm">
        <p class="font-medium text-zinc-400">To {{ $confession->to }}</p>

        <span class="text-zinc-600">{{ Carbon\Carbon::parse($confession->created_at)->format('m/d/y') }}</span>
    </div>
</div>
