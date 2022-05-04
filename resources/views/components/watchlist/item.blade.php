<div class="grid grid-cols-3">
    <div class="col-span-1">
        @if ($media->pivot->watched)
        <p class="line-through">{{ $media->name }}</p>
        @else
        <p>{{ $media->name }}</p>
        @endif
    </div>

    <div class="col-span-1">
        <x-watchlist.watched :watchlist="$watchlist" :media="$media" />
    </div>

    <div class="col-span-1">
        <x-watchlist.remove :watchlist="$watchlist" :media="$media" />
    </div>
</div>
