<x-layout>
    @auth
    <x-sidebar.home-sidebar>

        <div class="lg:grid lg:grid-cols-12">

            <div class="col-span-8 mr-8">
                <p class="text-xl mb-2">{{ $media->omdb->title }}</p>
                @if ($media->rating)
                <x-rating.rating :media="$media" class="flex flex-row mb-2" />
                @endif
                <p class="mb-4 text-sm text-gray-500">{{ $media->omdb->year . ' - ' . $media->omdb->rated . ' - ' . $media->omdb->runtime  }}</p>

                <hr class="mt-4 mb-4" />

                <p class="text-sm italic mb-6">{{ $media->omdb->plot }}</p>
                <p class="text-sm mb-2">Director: {{ $media->omdb->director }}</p>
                <p class="text-sm mb-2">Writers: {{ $media->omdb->writer }}</p>
                <p class="text-sm mb-2">Stars: {{ $media->omdb->actors }}</p>

                <hr class="mt-6 mb-6" />

                <p class="text-sm mb-6">{{ $media->omdb->awards }}</p>

                <a class="flex inline" href="https://www.imdb.com/title/{{ $media->omdb->imdb_id }}">
                    <x-icons name="imdb" />
                    <p class="text-sm mb-2 ml-2">{{ $media->omdb->imdb_rating . ' (' . $media->omdb->imdb_votes . ' votes)' }}</p>
                </a>

                <div class="flex inline">
                    <x-icons name="tomato" href="make this link to film on rt?" />
                    <p class="text-sm mb-2 ml-1">{{ $media->omdb->rotten_tomatoes_rating }}</p>
                </div>

                <div class="flex inline">
                    <x-icons name="metacritic" href="make this link to film on mc?" />
                    <p class="text-sm mb-2 ml-1">{{ $media->omdb->metascore }}</p>
                </div>

            </div>

            <div class="col-span-4 ml-6">
                <img width="85%" height="85%" src="{{ $media->omdb->poster }}" />
            </div>

        </div>

        <hr class="mt-12 mb-6" />

    </x-sidebar.home-sidebar>
    @endauth
</x-layout>
