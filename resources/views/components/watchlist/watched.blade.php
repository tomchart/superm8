@props (['watchlist', 'media', 'status'])

@php
$classes = 'text-sm hover:underline focus:underline';
if ($status) $classes .= ' text-gray-300';

$inverse_status = ($status == 1 ? 0 : 1);

$status_text = 'mark as watched';
if ($status) $status_text = 'watched';
@endphp

<form method="POST" action="/watchlist/{{ $watchlist->id }}/{{ $media->id }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="lg:grid lg:grid-cols-12">

        <input type="hidden" id="inverse_status" name="inverse_status" value="{{ $inverse_status }}" />

        @error('watchlist')
        <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror

        <div class="inline-flex col-span-4 ml-4">
            <button type="submit" class="{{ $classes }}">
                {{ $status_text }}
            </button>
        </div>

    </div>
</form>
