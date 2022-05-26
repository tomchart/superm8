<div x-data="{ expanded: false }">
    <button @click="expanded = ! expanded" type="button" class="btn btn-outline btn-primary mb-2">leave a comment</button>
    @if (session()->has('comment'))
    <span class="text-xs text-green-500 ml-4">{{ session('comment') }}</span>
    @endif
    @error('comment')
    <span class="text-xs text-red-500 ml-4">{{ $message }}</span>
    @enderror

    <div x-show="expanded" x-collapse>
        <form method="POST" action="{{ $action }}">
            @csrf
            <x-form.input name="body" placeholder="enter comment..." required />
            <x-form.button>post</x-form.button>
        </form>
    </div>
</div>
