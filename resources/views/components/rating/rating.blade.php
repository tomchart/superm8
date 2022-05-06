<p>
<div class="flex flex-row px-2 py-1.5">

    @if ($media->rating)
    @while ($media->rating->rating > 0)
    @if ($media->rating->rating > 0.5)
    <x-icons name="star-full" />
    @else
    <x-icons name="star-half" />
    @endif
    @php $media->rating->rating--; @endphp
    @endwhile
    @endif

</div>
</p>
