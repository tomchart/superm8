<form method="POST" action="/watchlist/{{ $watchlist->id }}/{{ $media->id }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="lg:grid lg:grid-cols-12">

        <input type="hidden" id="inverse_status" name="inverse_status" value="{{ $media->pivot->watched == 1 ? 0 : 1 }}" />

        @error('watchlist')
        <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror

        <div class="inline-flex col-span-6 ml-4 mt-2 mb-2">
            @if ($media->pivot->watched)
            <button class="btn btn-xs btn-ghost text-gray-400 text-sm">watched</button>
            @else
            <button class="btn btn-xs btn-secondary text-sm">mark as watched</button>
            @endif
        </div>
    </div>
</form>
