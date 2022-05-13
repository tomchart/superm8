<a href="/profile/{{ $user->username }}" class="mb-6 text-xl flex hover:underline">Watched</a>
<div class="lg:grid lg:grid-cols-5">
    @foreach ($user->media as $media)
    <div class="col-span-1 mr-4 mb-6 transform transition duration-500 hover:scale-105">
        <a href="/media/{{ $media->id }}"><img class="relative rounded" width="85%" height="85%" src="{{ $media->omdb->Poster }}" /></a>
    </div>
    @endforeach
</div>
