<x-layout>
    <x-sidebar.home-sidebar>
        <form method="POST" action="/club" class="mt-10">
            @csrf
            <x-form.label name="club name" required />
            <x-form.input name="name" required />

            <x-form.label name="slug" required />
            <x-form.input name="slug" required />

            <x-form.button>create club</x-form.button>
        </form>
    </x-sidebar.home-sidebar>
</x-layout>
