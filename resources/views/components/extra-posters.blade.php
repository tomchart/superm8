<div x-show="expanded" x-collapse>
    <div class="lg:grid lg:grid-cols-5">
        @foreach ($user->media->slice(5) as $media)
        <div class="col-span-1 mr-4 mb-6 transform transition duration-500 hover:scale-105">
            <x-poster :media="$media" />
        </div>
        @endforeach
    </div>
    <button @click="expanded = ! expanded; hidden = ! hidden" type="button" class="btn btn-outline btn-primary">see less</button>
</div>
