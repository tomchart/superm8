<div x-data="{ searched: false }">
    <form method="POST" action='/profile/{{ auth()->user()->username }}/media' enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="lg:grid lg:grid-cols-12 mb-4 text-black">
            <div class="col-span-6">
                <x-form.input x-on:keyup="searched = true" id="search" name="search" placeholder="enter title/director/year..." class="mt-2" onkeyup="window.fetchData()" required />
            </div>


            <div class="inline-flex col-span-6">
                <select name="type_id" id="type_id" class="select bg-secondary mt-8 mr-2 ml-4">
                    <option disabled selected>media type</option>
                    @foreach ($mediaTypes as $type)
                    <option value="{{ $type->id }}">{{ ucwords($type->type) }}</option>
                    @endforeach
                </select>

                <select name="rating_ebert" id="rating_ebert" class="select bg-secondary mt-8 ml-2 mr-2">
                    <option disabled selected>ebert rating</option>
                    <option value="">unrated</option>
                    @foreach ($ratings as $rating)
                    <option value="{{ $rating->id }}">{{ $rating->rating }}</option>
                    @endforeach
                </select>

                <x-form.button class="mt-2 ml-2">add to watched</x-form.button>
            </div>

        </div>
    </form>

    <table x-show="searched" class="table table-bordered table-hover">
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

<div class="divider"></div>
