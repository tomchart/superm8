@props (['watchlist', 'media'])

@php
$status = $media->getOriginal('pivot_watched');

$classes = 'text-black';
if ($status) $classes .= ' line-through';
@endphp

<div class="grid grid-cols-2">
    <div class="col-span-1">
        <p class="{{ $classes }}">{{ $media->name }}</p>
    </div>
    <div class="col-span-1">
        <x-watchlist.watched :watchlist="$watchlist" :media="$media" :status="$status" :club="$club" />
    </div>
</div>
