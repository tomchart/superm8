<x-layout>
    @auth
    <x-sidebar.home-sidebar>

        <div class="lg:grid lg:grid-cols-12">

            <div class="col-span-8 mr-8">
                <p class="text-xl mb-2">{{ $media->omdb->Title }}</p>
                @if ($media->rating_ebert)
                <x-rating.rating :media="$media" class="flex flex-row mb-2" />
                @endif
                <p class="mb-4 text-sm text-gray-500">{{ $media->omdb->Year . ' - ' . $media->omdb->Rated . ' - ' . $media->omdb->Runtime  }}</p>

                <hr class="mt-4 mb-4" />

                <p class="text-sm italic mb-6">{{ $media->omdb->Plot }}</p>
                @if ($media->omdb->Director != "N/A")
                <p class="text-sm mb-2">Director: {{ $media->omdb->Director }}</p>
                @endif
                <p class="text-sm mb-2">Writers: {{ $media->omdb->Writer }}</p>
                <p class="text-sm mb-2">Stars: {{ $media->omdb->Actors }}</p>

                <hr class="mt-6 mb-6" />

                <x-ratings :omdb="$media->omdb" />

            </div>

            <div class="col-span-4 ml-6">
                <img width="85%" height="85%" src="{{ $media->omdb->Poster }}" />
            </div>

        </div>

        <hr class="mt-12 mb-6" />

    </x-sidebar.home-sidebar>
    @endauth
</x-layout>
