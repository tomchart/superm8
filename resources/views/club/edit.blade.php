<x-layout>
    <x-sidebar.account-sidebar>
        <form method="POST" action='/admin/club/{{ $club->id }}' enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.label name="name" required />
            <x-form.input name="name" :value="old('title', $club->name)" />

            <x-form.label name="slug" required />
            <x-form.input name="slug" :value="old('slug', $club->slug)" />

            <x-form.button>Update</x-form.button>
        </form>
    </x-sidebar.account-sidebar>
</x-layout>
