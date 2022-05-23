<div x-data="{ expanded: false, hidden: true }">
    <div class="lg:grid lg:grid-cols-5 lg:grid-rows-{{ round($user->media->count() / 5) }}">
        @if ($user->media->count() <= 4) @foreach ($user->media as $media)
            <div class="col-span-1 mr-4 mb-6 transform transition duration-500 hover:scale-105">
                <x-poster :media="$media" />
            </div>
            @endforeach
            @else
            @foreach ($user->media->slice(0, 4) as $media)
            <div class="col-span-1 mr-4 mb-6 transform transition duration-500 hover:scale-105">
                <x-poster :media="$media" />
            </div>
            @endforeach
            <x-more-poster :media="$user->media->slice(4, 1)->first()" :user="$user" />
    </div>

    <x-extra-posters :user="$user" />

    @endif

</div>
