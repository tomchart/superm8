<x-layout>
    @auth
    <x-sidebar.home-sidebar>
        <h1 class="mb-6 text-xl">Clubs & Watchlists</h1>
        @foreach ($clubs as $club)
        <a href="/club/{{ $club->slug }}" class="mb-6 text-xl flex hover:underline">{{ $club->name }}</a>
        @foreach ($club->watchlists as $watchlist)
        @if ($watchlist->media->count() > 0)
        <a href="/club/{{ $club->slug }}#list" class="mb-6 text-xl flex hover:underline">{{ $watchlist->name }}</a>
        <div class="lg:grid lg:grid-cols-5">
            @foreach ($watchlist->media as $media)
            <div class="col-span-1 mr-4 mb-6 transform transition duration-500 hover:scale-105">
                <a href="/media/{{ $media->id }}"><img class="relative rounded" width="85%" height="85%" src="{{ $media->omdb->poster }}" /></a>
            </div>
            @endforeach
        </div>
        @endif
        @endforeach
        @endforeach


        <hr class="mb-6" />

        <a href="/profile/{{ auth()->user()->username }}" class="mb-6 text-xl flex hover:underline">Watched</a>
        <div class="lg:grid lg:grid-cols-5">
            @foreach ($user->media as $media)
            <div class="col-span-1 mr-4 mb-6 transform transition duration-500 hover:scale-105">
                <a href="/media/{{ $media->id }}"><img class="relative rounded" width="85%" height="85%" src="{{ $media->omdb->poster }}" /></a>
            </div>
            @endforeach
        </div>
    </x-sidebar.home-sidebar>
    @else
    <div class="text-center">
        <p class="text-lg mt-20 mb-6">Hi there.</p>
        <p>Please <a class="underline hover:italic" href="/login">log in</a> to view content.</p>
    </div>
    @endauth
</x-layout>
