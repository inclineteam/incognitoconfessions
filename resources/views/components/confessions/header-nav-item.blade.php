@props(['link', 'text', 'icon'])

<a href="/{{ $link }}"
    class="{{ Route::current()->uri == $link ? 'text-indigo-400' : 'text-zinc-400 hover:text-white' }} flex items-end space-x-3 rounded-lg text-sm font-medium">
    <i
        class="{{ $icon }} {{ Route::current()->uri == $link ? 'text-indigo-400' : 'text-zinc-500' }} text-base"></i>
    <span class="ml-2">{{ $text }}</span>
</a>
