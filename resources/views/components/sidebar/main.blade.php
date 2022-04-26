<div class="lg:grid lg:grid-cols-12 px-6 py-8">
    <x-panel class="col-span-3 lg:pt-14 mb-10 mr-4">
        {{ $side }}
    </x-panel>

    <x-panel class="col-span-9 lg:pt-14 mb-10">
        {{ $slot }}
    </x-panel>
</div>
