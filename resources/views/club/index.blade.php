<x-layout>
    <x-table.table label="clubs">
        @foreach ($clubs as $club)
        <x-table.row>
            <x-table.text href="/club/{{ $club->slug }}" text="{{ $club->name }}" />
            <x-table.text href="/admin/club/{{ $club->id }}/edit" text="edit" />
            <x-table.button action="/admin/club/{{ $club->id }}/{{ auth()->user()->id }}" method="DELETE" text="leave" />
            <x-table.button action="/admin/club/{{ $club->id }}" method="DELETE" text="delete" />
        </x-table.row>
        @endforeach
    </x-table.table>
</x-layout>
