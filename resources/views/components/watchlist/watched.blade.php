<form method="POST" action="/watchlist/{{ $watchlist->id }}/{{ $media->id }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="lg:grid lg:grid-cols-12">

        <input type="hidden" id="inverse_status" name="inverse_status" value="{{ $media->pivot->watched == 1 ? 0 : 1 }}" />

        @error('watchlist')
        <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror

        <div class="inline-flex col-span-4 ml-4">
            @if ($media->pivot->watched)
            <button type="submit" class="text-sm hover:underline focus:underline text-gray-300">
                watched
            </button>
            @else
            <button type="submit" class="text-sm hover:underline focus:underline">
                mark as watched
            </button>
            @endif

        </div>

    </div>
</form>
