@props(['label', 'name', 'type' => 'text', 'inputBg' => 'bg-[#3d3d43]', 'icon'])

<div {{ $attributes->merge(['class' => 'group relative']) }}>
    <label for="{{ $name }}" class="text-white/50">
        {{ $label }}
    </label>

    @error($name)
        <div
            class="input-error-border group mt-2 flex w-full items-center space-x-4 rounded bg-[#3d3d43] px-4 py-2 duration-150">
            <i class="{{ $icon }} text-white/50 group-focus-within:text-white/80"></i>
            <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name) }}"
                class="flex-1 bg-transparent p-0 text-white/80 outline-none" autocomplete="off" />
        </div>

        <div class="form-control-errmsg">
            {{ $message }}
        </div>
    @else
        <div
            class="input-focus-styles group mt-2 flex w-full items-center space-x-4 rounded bg-[#3d3d43] px-4 py-2 duration-150">
            <i class="{{ $icon }} text-white/50 group-focus-within:text-white/80"></i>
            <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
                value="{{ old($name) }}" class="flex-1 bg-transparent p-0 text-white/80 outline-none"
                autocomplete="off" />
        </div>
    @enderror
</div>
