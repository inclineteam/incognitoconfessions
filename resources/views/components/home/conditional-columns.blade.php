@props(['items'])

@if (count($items) <= 3)
    <div class="flex w-full items-start gap-6">
        {{ $slot }}
    </div>
@else
    <div class="w-full columns-4 gap-6">
        {{ $slot }}
    </div>
@endif
