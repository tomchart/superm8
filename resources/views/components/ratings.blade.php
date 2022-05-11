@if ($omdb->Awards)
<p class="text-sm mb-6">{{ $omdb->Awards }}</p>
@endif

@if ($omdb->imdbRating)
<a class="flex inline" href="https://www.imdb.com/title/{{ $omdb->imdbID }}">
    <x-icons name="imdb" />
    <p class="text-sm mb-2 ml-2">{{ $omdb->imdbRating . ' (' . $omdb->imdbVotes . ' votes)' }}</p>
</a>
@endif

@if ($omdb->rottenTomatoesRating)
<div class="flex inline">
    <x-icons name="tomato" href="make this link to film on rt?" />
    <p class="text-sm mb-2 ml-1">{{ $omdb->rottenTomatoesRating }}</p>
</div>
@endif

@if ($omdb->Metascore != "N/A")
<div class="flex inline">
    <x-icons name="metacritic" href="make this link to film on mc?" />
    <p class="text-sm mb-2 ml-1">{{ $omdb->Metascore }}</p>
</div>
@endif
