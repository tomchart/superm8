<!-- this is very hacky and could be done about a million times better -->
<div class="{{ $class }}">
    @if ($media->rating)
    @for ($i = 0; $i < floor($media->rating->getOriginal('rating')); $i++)
        <x-icons name="star-full" />
    @endfor
    @if ($i < $media->rating->getOriginal('rating'))
        <x-icons name="star-half" />
    @endif
    @endif
</div>
