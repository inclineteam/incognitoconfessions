@props(['placeholder' => '' , 'name' => '', 'bgInput' => '' ,'type' => 'text', 'defaultValue' => ''])
<div {{ $attributes->merge(['class' => 'group relative']) }}>
    @error($name)
        <input type="{{ $type }}" id="{{ $name }}"
            value="{{ $defaultValue != '' ? $defaultValue : old($name) }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
            class="input-error-border p-3 {{ $bgInput }} block w-full rounded-full  text-white/80 !outline-none duration-150"
            autocomplete="{{ $type == 'password' ? 'new-password' : 'off' }}" />
        <div class="form-control-errmsg">{{ $message }}</div>
    @else
        <input type="{{ $type }}" id="{{ $name }}"
            value="{{ $defaultValue != '' ? $defaultValue : old($name) }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
            class="input-focus-styles p-3 block {{ $bgInput }} rounded-full w-full  text-white/80 !outline-none duration-150"
            autocomplete="{{ $type == 'password' ? 'new-password' : 'off' }}" />
    @enderror
</div>
