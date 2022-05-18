<div x-data="{ expanded: false }">
    <button @click="expanded = ! expanded" type="button" class="bg-gray-700 text-white rounded-full py-2 px-8 hover:bg-gray-800 mt-2 mb-2 ml-4">leave a comment</button>
    @if (session()->has('comment'))
    <span class="text-xs text-green-500 ml-4">{{ session('comment') }}</span>
    @endif
    @error('comment')
    <span class="text-xs text-red-500 ml-4">{{ $message }}</span>
    @enderror

    <div x-show="expanded" class="mt-4" x-collapse>
        <form method="POST" action="/media/{{ $media->id }}/comment">
            @csrf
            <x-form.label name="leave a comment" required />
            <x-form.input name="body" required />

            <button type="submit" class="bg-gray-700 text-white rounded-full py-2 px-8 hover:bg-gray-800 mt-2">post</button>
        </form>
    </div>
</div>
