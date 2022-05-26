<x-layout>
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

    <x-table.table>
        <x-slot name="head">
            <th></th>
            <th>users</th>
            <th></th>
        </x-slot>
        <x-slot name="row">
            @foreach ($club->users as $user)
            <tr>
                <th></th>
                <td><a class="hover:underline" href="/profile/{{ $user->username }}">{{ $user->username . ' (' . $user->name . ')' }}</a></td>
                <th>
                    <x-table.button action="/admin/club/{{ $club->id }}/{{ $user->id }}" method="DELETE" btnClass="btn btn-xs btn-error" btnText="remove" />
                </th>
                @endforeach
            </tr>
        </x-slot>
    </x-table.table>

    <div class="divider"></div>

    <x-table.table>
        <x-slot name="head">
            <th></th>
            <th>watchlists</th>
            <th></th>
        </x-slot>
        <x-slot name="row">
            @foreach ($club->watchlists as $watchlist)
            <tr>
                <th></th>
                <td>{{ $watchlist->name }}</td>
                <th>
                    <x-table.button action="/watchlist/{{ $club->id }}/{{ $watchlist->id }}/remove" method="DELETE" btnClass="btn btn-xs btn-error" btnText="remove" />
                </th>
                @endforeach
            </tr>
        </x-slot>
    </x-table.table>

</x-layout>
