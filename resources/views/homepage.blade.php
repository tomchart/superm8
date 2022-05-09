<x-layout>
    @auth
    <x-sidebar.home-sidebar>
        <h1 class="mb-6 text-lg">unwatched</h1>

        <hr class="mb-6" />
        <h1 class="mb-6 text-lg">watched</h1>
        <div class="lg:grid lg:grid-cols-5">
            @foreach ($user->media as $media)

            <div class="col-span-1 mr-4 mb-4 transform transition duration-500 hover:scale-105">
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
