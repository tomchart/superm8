<div x-data="{ searched: false }">
    <form method="POST" action='/watchlist/{{ $club->id }}/' enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="lg:grid lg:grid-cols-12 text-black">
            <div class="col-span-5">
                <x-form.input x-on:keyup="searched = true" id="search" name="search" placeholder="enter title/director/year..." class="mt-2" onkeyup="window.fetchData()" required />
            </div>

            <div class="inline-flex col-span-7">
                <select name="type_id" id="type_id" class="select bg-secondary mt-8 mr-2 ml-6">
                    <option disabled selected hidden>media type</option>
                    @foreach ($mediaTypes as $type)
                    <option value="{{ $type->id }}">{{ ucwords($type->type) }}</option>
                    @endforeach
                </select>

                <select name="watchlist_id" id="watchlist_id" class="select bg-secondary mt-8 mr-2 ml-4">
                    <option disabled selected hidden>watchlist</option>
                    @foreach ($club->watchlists as $watchlist)
                    <option value="{{ $watchlist->id }}">{{ ucwords($watchlist->name) }}</option>
                    @endforeach
                </select>

                <select name="rating_ebert" id="rating_ebert" class="select bg-error mt-8 mr-2 ml-4">
                    <option disabled selected hidden>rating</option>
                    <option value="">unrated</option>
                    @foreach ($ratings as $rating)
                    <option value="{{ $rating->id }}">{{ $rating->rating }}</option>
                    @endforeach
                </select>

                <!-- this doesnt work -->
                @error ('error')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror

                <x-form.button class="mt-2 ml-4">add</x-form.button>
            </div>
        </div>
    </form>
    <table x-show="searched" class="table table-bordered table-hover mt-2">
        <thead>
            <tr>
                <th>Title</th>
                <th>Year</th>
                <th>Director</th>
            </tr>
        </thead>
        <tbody id="tbodyfordata">
            <!-- Data will be appened here -->
        </tbody>
    </table>
</div>
