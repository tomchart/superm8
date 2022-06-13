<form method="POST" action="/watchlist/{{ $watchlist->id }}/{{ $media->id }}" enctype="multipart/form-data">
    @csrf
    @method('DELETE')

    <div class="lg:grid lg:grid-cols-12">

        <input type="hidden" id="inverse_status" name="inverse_status" value="{{ $media->pivot->watched == 1 ? 0 : 1 }}" />

        @error('watchlist')
        <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror

        <div class="inline-flex col-span-4 ml-4 mt-2 mb-2">
            <button class="btn btn-xs btn-error">remove</button>
        </div>
    </div>
</form>
