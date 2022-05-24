<x-layout>
    <form method="POST" action="/club" class="mt-10">
        @csrf
        <x-form.label name="club name" required />
        <x-form.input name="name" required />

        @error('club')
        <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror

        <x-form.button>create club</x-form.button>
    </form>
</x-layout>
