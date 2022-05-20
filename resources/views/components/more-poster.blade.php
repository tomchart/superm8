<div class="indicator col-span-1 mr-4 mb-6 transform transition duration-500 hover:scale-105">
    <span class="indicator-item indicator-middle indicator-center badge badge-primary">{{ $user->media->count() - 4 . "+" }}</span>
    <img class="relative rounded transform blur" width="150" height="250" src="{{ $media->Poster }}" />
</div>
