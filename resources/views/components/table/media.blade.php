<td class="px-6 py-4 whitespace-nowrap">
    <div class="flex items-center">
        <div class="text-sm font-medium text-white hover:underline">
            <a class="flex flex-row" href="/media/{{ $media->id }}">
                {{ $media->Title }}
                <x-rating.rating :media="$media" :ratings="$ratings" class="flex flex-row px-2 py-1.5" />
            </a>
        </div>
    </div>
</td>
