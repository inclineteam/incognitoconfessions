@props(["confessions" => $confessions])
<div>
    @foreach ($confessions as $confession)
        <x-confession-card :confession="$confession" />
    @endforeach
</div>