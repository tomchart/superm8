<x-layout>
    <x-table.table>
        <x-slot name="head">
            <th></th>
            <th>Club Name</th>
            <th></th>
            <th></th>
            <th></th>
        </x-slot>
        <x-slot name="row">
            @foreach ($clubs as $club)
            <tr>
                <th></th>
                <td><a class="hover:underline" href="/club/{{ $club->slug }}">{{ $club->name }}</a></td>
                <th>
                    <x-link-button class="btn-xs btn-secondary" href="/admin/club/{{ $club->id }}/edit" text="edit" />
                </th>
                <th>
                    <x-table.button action="/admin/club/{{ $club->id }}/{{ auth()->user()->id }}" method="DELETE" btnClass="btn btn-xs btn-primary" btnText="leave" />
                </th>
                <th>
                    <x-table.button action="/admin/club/{{ $club->id }}" method="DELETE" btnClass="btn btn-xs btn-error" btnText="delete" />
                </th>
            @endforeach
            </tr>
        </x-slot>
    </x-table.table>
</x-layout>
