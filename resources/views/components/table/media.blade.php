<td class="px-6 py-4 whitespace-nowrap">
    <div class="flex items-center">
        <div class="text-sm font-medium text-gray-900 hover:underline">
            <a class="flex flex-row" href="/{{ $media->id }}">
                {{ $media->name }}
                <x-rating.rating :media="$media" :ratings="$ratings" />
            </a>
        </div>
    </div>
</td>
