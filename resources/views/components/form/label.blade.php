@props (['name'])
<label class="lowercase font-bold text-xs text-gray-300" for="{{ $name }}">
    {{ ucwords($name) }}
</label>
