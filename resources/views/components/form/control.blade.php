@props(['label', 'name', 'type' => 'text', 'inputBg' => 'bg-[#3d3d43]'])

<div {{ $attributes->merge(['class' => 'group relative']) }}>
    <label for="{{ $name }}" class="text-white/50">
        {{ $label }}
    </label>

    @error($name)
        <input type="{{ $type }}" id="{{ $name }}" value="{{ old($name) }}" name="{{ $name }}"
            class="{{ $inputBg }} input-error-border mt-2 block w-full rounded px-3 py-2 text-white/80 outline-none duration-150"
            autocomplete="{{ $type == 'password' ? 'new-password' : 'off' }}" />

        <div class="form-control-errmsg">
            {{ $message }}</div>
    @else
        <input type="{{ $type }}" id="{{ $name }}" value="{{ old($name) }}" name="{{ $name }}"
            class="{{ $inputBg }} input-focus-styles mt-2 block w-full rounded px-3 py-2 text-white/80 outline-none duration-150"
            autocomplete="{{ $type == 'password' ? 'new-password' : 'off' }}" />
    @enderror
</div>
