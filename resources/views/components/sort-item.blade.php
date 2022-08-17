@props(['value', 'label'])

<form action="/confessions">
    <input type="submit" name="sort" value="{{ $value }}" id="{{ $value }}" class="hidden">
    <label for="{{ $value }}"
        class="{{ $value === request('sort') ? 'bg-zinc-800 text-zinc-300 ' : 'hover:bg-zinc-800/70 text-zinc-400 ' }} block w-full cursor-pointer rounded py-3 pl-3 pr-14 text-sm duration-100">
        {{ $label }}
    </label>
</form>
