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

                <div class="inline-flex col-span-4 ml-4 mt-6">
                    <x-form.button>update</x-form.button>
                </div>
            </div>
        </form>

        <div class="mt-6 mb-6 border-t border-gray-600"></div>

        <x-table.table label="users">
            @foreach ($club->users as $user)
            <x-table.row>
                <x-table.text href="/profile/{{ $user->username }}" text="{{ $user->username . ' (' . $user->name . ')' }}" />
                <x-table.button action="/admin/club/{{ $club->id }}/{{ $user->id }}" method="DELETE" text="remove" />
            </x-table.row>
            @endforeach
        </x-table.table>

        <div class="mt-6">
            <x-table.table label="watchlists">
                @foreach ($club->watchlists as $watchlist)
                <x-table.row>
                    <x-table.text href="/club/{{ $club->slug }}#list" text="{{ $watchlist->name }}" />
                    <x-table.button action="/watchlist/{{ $club->id }}/{{ $watchlist->id }}/remove" method="DELETE" text="remove" />
                </x-table.row>
                @endforeach
            </x-table.table>
        </div>

    </x-sidebar.account-sidebar>
</x-layout>
