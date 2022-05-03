@foreach ($club->watchlists as $watchlist)
<h3 class="underline font-semibold mb-2" id="list">{{ $watchlist->name }}</h3>
@foreach ($watchlist->media as $media)
<x-watchlist.item class="mt-8" :watchlist="$watchlist" :media="$media" />
@endforeach
<hr class="mt-6 mb-6">
@endforeach
