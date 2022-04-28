<x-dropdown.main>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            <x-icons name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"></x-icons>
            media type
        </button>
    </x-slot>

    @foreach ($types as $type)
    <x-dropdown.item href="/?type={{ $type->id }}&{{ http_build_query(request()->except('type', 'page')) }}">{{ ucwords($type->type )}}
    </x-dropdown.item>
    @endforeach
</x-dropdown.main>
