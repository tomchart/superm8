@props (['name'])
<x-form.field>
    <input class="border border-gray-600 bg-gray-800 p-2 w-full rounded mb-6" name="{{ $name }}" id="{{ $name }}" {{ $attributes(['value' => old($name)]) }}>
    <x-form.error name="{{ $name }}" />
</x-form.field>
