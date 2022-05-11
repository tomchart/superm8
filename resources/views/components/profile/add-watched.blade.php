<form method="POST" action='/profile/{{ auth()->user()->username }}/media' enctype="multipart/form-data">
    @csrf
    @method('POST')

    <div class="lg:grid lg:grid-cols-12">
        <div class="col-span-7">
            <x-form.label name="add something" />
            <x-form.input name="name" required />
        </div>

        <div class="inline-flex col-span-5">
            <select name="type_id" id="type_id" class="mt-4 ml-4 mr-4">
                @foreach ($mediaTypes as $type)
                <option value="{{ $type->id }}">{{ ucwords($type->type) }}</option>
                @endforeach
            </select>

            <select name="rating_ebert" id="rating_ebert" class="mt-4 ml-4 mr-4">
                <option value="" disabled selected hidden>rating</option>
                <option value="">unrated</option>
                @foreach ($ratings as $rating)
                <option value="{{ $rating->id }}">{{ $rating->rating }}</option>
                @endforeach
            </select>

            <x-form.button>add</x-form.button>
        </div>

    </div>
</form>
