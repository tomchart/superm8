<div class="grid grid-cols-3">
    <div class="col-span-1 inline-flex">
        @if ($media->pivot->watched)
        <a href="/media/{{ $media->id }}" class="line-through">{{ $media->Title }}</a>
        @else
        <a href="/media/{{ $media->id }}" class="hover:underline">{{ $media->Title }}</a>
        @endif
        <x-rating.rating :media="$media" class="flex flex-row px-2 py-1.5" />
    </div>

    <div class="col-span-1">
        <x-watchlist.watched :watchlist="$watchlist" :media="$media" />
    </div>

    <div class="col-span-1">
        <x-watchlist.remove :watchlist="$watchlist" :media="$media" />
    </div>
</div>
