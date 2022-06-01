@props (['name'])
<x-form.field>
    <input {{ $attributes(['class' => 'input input-secondary bg-secondary w-full mb-2 placeholder-base-100 text-black placeholder-black']) }} name="{{ $name }}" id="{{ $name }}" {{ $attributes(['value' => old($name)]) }} placeholder="{{ $attributes['placeholder'] }}">
    <x-form.error name="{{ $name }}" />
</x-form.field>
