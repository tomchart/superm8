<x-layout>
    @auth

    <div class="lg:grid lg:grid-cols-12">

        <div class="col-span-8 mr-8">
            <p class="text-xl mb-2">{{ $media->Title }}</p>
            @if ($media->rating_ebert)
            <!-- unsure about where i want the ebert review to be linked atm -->
            <a href="{{ $media->ebert_review }}"><x-rating.rating :media="$media" class="flex flex-row mb-2" /></a>
            @endif
            <p class="mb-4 text-sm text-gray-400">{{ $media->Year . ' - ' . $media->Rated . ' - ' . $media->Runtime  }}</p>

            <div class="mt-4 mb-4 border-t border-gray-600"></div>


            <p class="text-sm italic mb-6">{{ $media->Plot }}</p>
            @if ($media->Director != "N/A")
            <p class="text-sm mb-2">Director: {{ $media->Director }}</p>
            @endif
            <p class="text-sm mb-2">Writers: {{ $media->Writer }}</p>
            <p class="text-sm mb-2">Stars: {{ $media->Actors }}</p>

            <div class="mt-6 mb-6 border-t border-gray-600"></div>

            <x-ratings :media="$media" />
        </div>

        <div class="col-span-4 ml-6">
      <a href="https://www.imdb.com/title/{{ $media->imdbID }}">
        <img width="85%" height="85%" src="{{ $media->Poster }}" class="transform transition duration-500 hover:scale-105" />
      </a>
        </div>

    </div>

    <div class="mt-6 mb-6 border-t border-gray-600"></div>

    <div class="lg:grid lg:grid-cols-12">
        <section class="col-span-8" id="comments">
            <x-comment.add :media="$media" action="/media/{{ $media->id }}/comment" />
        </section>

        <section class="col-span-8 mt-10 space-y-6">
            @foreach ($comments as $comment)
            <x-comment.comment :comment="$comment" />
            @endforeach
        </section>
    </div>
    <x-comment.paginator :paginator="$comments" />

    @endauth
</x-layout>
