<x-layout>
    <x-sidebar.account-sidebar>
        <form method="POST" action='/admin/club/{{ $club->id }}' enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="lg:grid lg:grid-cols-12">
                <div class="col-span-8">
                    <x-form.label name="name" />
                    <x-form.input name="name" :value="old('title', $club->name)" />
                </div>

                <div class="inline-flex col-span-4 ml-4">
                    <x-form.button>update</x-form.button>
                </div>
            </div>
        </form>

        <x-table.table label="users">
            @foreach ($club->users as $user)
            <x-table.row>
                <x-table.text href="/profile/{{ $user->username }}" text="{{ $user->username . ' (' . $user->name . ')' }}" />
                <x-table.button action="/admin/club/{{ $club->id }}/{{ $user->id }}" method="DELETE" text="remove" />
            </x-table.row>
            @endforeach
        </x-table.table>

    </x-sidebar.account-sidebar>
</x-layout>
