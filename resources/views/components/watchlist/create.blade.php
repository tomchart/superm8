<form method="POST" action='/watchlist/{{ $club->id }}/create' enctype="multipart/form-data">
    @csrf
    @method('POST')

    <div class="lg:grid lg:grid-cols-12">
        <div class="col-span-8">
            <x-form.input name="name" placeholder="enter name..." class="mt-2" required />
        </div>

        @error ('watchlist')
        <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror

        <div class="inline-flex col-span-4 ml-4">
            <x-form.button class="mt-2 ml-2">create</x-form.button>
        </div>

    </div>
</form>
