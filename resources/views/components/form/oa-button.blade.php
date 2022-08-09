@props(['provider'])

<form action="/auth/redirect/{{ $provider }}">
    <button type="submit"
        {{ $attributes->merge(['class' => 'grid w-full grid-cols-[0.9fr_1.1fr] items-center space-x-4 rounded border border-zinc-700/50 hover:bg-zinc-700/30 text-zinc-300 bg-transparent py-3 font-medium']) }}>
        {{ $slot }}
    </button>
</form>
