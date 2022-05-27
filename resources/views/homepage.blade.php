<x-layout>
    @auth
    @if ($user->media->count() == 0 and $user->clubs->count() == 0)
    <x-splash />
    @else
    <h1 class="mb-6 text-xl">Clubs & Watchlists</h1>
    @foreach ($clubs as $club)
    @foreach ($club->watchlists as $watchlist)
    @if ($watchlist->unwatched->count() > 0)
    <div class="mb-6">
        <x-link-button href="/club/{{ $club->slug }}" class="btn-outline btn-primary" :text="$club->name" />
        <x-link-button href="/club/{{ $club->slug }}#list" class="btn-outline btn-secondary mb-6" :text="$watchlist->name" />
    </div>
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

    <x-link-button href="/profile/{{ $user->username }}" class="btn-outline btn-primary mb-6" text="{{ auth()->user()->username }}'s watched" />
    <x-watched :user="$user" />
    @endif
    @else
    <div class="text-center">
        <div class="hero min-h-screen" style="background-image: url(/images/super8_camera.jpeg)">
            <div class="hero-overlay bg-opacity-80"></div>
            <div class="hero-content text-center text-neutral-content">
                <div class="max-w-md">
                    <h1 class="mb-5 text-5xl font-bold">Hi there!</h1>
                    <p class="mb-5">Welcome to superm8 - the film club social network.</p>
                    <x-link-button href="/register" class="btn-primary" text="get started" />
                </div>
            </div>
        </div>
    </div>
    @endauth
</x-layout>
