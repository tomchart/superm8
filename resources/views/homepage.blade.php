<x-layout>
    @auth
    <x-sidebar.home-sidebar>
        <h1 class="mb-6 text-xl">Clubs & Watchlists</h1>
        @foreach ($clubs as $club)
        <a href="/club/{{ $club->slug }}" class="mb-6 text-xl flex hover:underline">{{ $club->name }}</a>
        @foreach ($club->watchlists as $watchlist)
        @if ($watchlist->unwatched->count() > 0)
        <a href="/club/{{ $club->slug }}#list" class="mb-6 text-xl flex hover:underline">{{ $watchlist->name }}</a>
        <div class="lg:grid lg:grid-cols-5">
            @foreach ($watchlist->unwatched as $media)
            <div class="col-span-1 mr-4 mb-6 transform transition duration-500 hover:scale-105">
                <a href="/media/{{ $media->id }}"><img class="relative rounded" width="85%" height="85%" src="{{ $media->Poster }}" /></a>
            </div>
            @endforeach
        </div>
        @endif
        @endforeach
        @endforeach


        <div class="mb-6 border-t border-gray-600"></div>

        <x-watched :user="$user" />
    </x-sidebar.home-sidebar>
    @else
    <div class="text-center">
        <p class="text-lg mt-20 mb-6">Hi there.</p>
        <p>Please <a class="underline hover:italic" href="/login">log in</a> or <a class="underline hover:italic" href="/register">register</a> to view content.</p>
    </div>
    @endauth
</x-layout>
