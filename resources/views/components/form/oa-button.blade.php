@props(['provider'])

<form action="/auth/redirect/{{ $provider }}">
    <button type="submit"
        {{ $attributes->merge(['class' => 'flex w-full items-center justify-center space-x-4 rounded border bg-transparent py-3 font-medium']) }}>
        {{ $slot }}
    </button>
</form>
