<div x-show="hidden">
    <div class="indicator mr-4 mb-6 transform transition duration-500 hover:scale-105">
        <span class="indicator-item indicator-middle indicator-center badge badge-primary">{{ $user->media->count() - 4 . "+" }}</span>
        <img @click="expanded = ! expanded; hidden = ! hidden" class="relative rounded transform blur" width="150" height="250" src="{{ $media->Poster }}" />
    </div>
</div>
<div x-cloak x-show="expanded">
    <div class="mr-4 mb-6 transform transition duration-500 hover:scale-105">
        <x-poster :media="$media" />
    </div>
</div>
