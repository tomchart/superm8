<form method="POST" action='/watchlist/{{ $club->id }}/create' enctype="multipart/form-data">
    @csrf
    @method('POST')

    <div class="lg:grid lg:grid-cols-12">
        <div class="col-span-8">
            <x-form.label name="watchlist name" />
            <x-form.input name="name" required />

        </div>

        @error ('watchlist')
        <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror

        <div class="inline-flex col-span-4 ml-4">
            <x-form.button>add</x-form.button>
        </div>

    </div>
</form>
