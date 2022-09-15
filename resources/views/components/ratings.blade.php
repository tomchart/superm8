@if ($media->Awards)
<p class="text-sm mb-6">{{ $media->Awards }}</p>
@endif

@if ($media->imdbRating)
<a class="flex inline" href="https://www.imdb.com/title/{{ $media->imdbID }}">
    <x-icons name="imdb" />
    <p class="text-sm mb-2 ml-2">{{ $media->imdbRating . ' (' . $media->imdbVotes . ' votes)' }}</p>
</a>
@endif

@if ($media->ebert_review)
<a class="flex inline" href="{{ $media->ebert_review }}">
    <div class="flex inline-flex mb-2">
      <x-icons name="ebert" />
      <div class="ml-2">
        <x-rating.rating :media="$media" class="flex flex-row" />
      </div>
    </div>
</a>
@endif

@if ($media->rottenTomatoesRating)
<div class="flex inline">
    <x-icons name="tomato" href="make this link to film on rt?" />
    <p class="text-sm mb-2 ml-1">{{ $media->rottenTomatoesRating }}</p>
</div>
@endif

@if ($media->Metascore != "N/A")
<div class="flex inline">
    <x-icons name="metacritic" href="make this link to film on mc?" />
    <p class="text-sm mb-2 ml-1">{{ $media->Metascore }}</p>
</div>
@endif
