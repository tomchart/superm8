@props (['trigger'])

<div x-data="{ show: false }" @click.away="show = false" class="relative">
    {{-- Trigger --}}
    <div @click="show = ! show">
        {{ $trigger }}
    </div>

    {{-- Links --}}
    <div x-show="show" class="py-2 pl-3 pr-9 absolute bg-gray-100 mt-2 rounded-xl w-full z-50 overflow-auto max-h-52">
        {{ $slot }}
    </div>
</div>
