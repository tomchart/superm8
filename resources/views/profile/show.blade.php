<x-layout>
    @auth
    <x-sidebar.home-sidebar>
        <p class="text-lg">{{ $user->name }}</p>
        <p class="mb-4 italic text-sm text-gray-500">{{ '@' . $user->username }}</p>
        <p class="text-sm">{{ $user->description }}</p>

        <hr class="mt-12 mb-6" />

        <h2 class="font-bold underline text-lg">watched</h2>
        <x-profile.add-watched :mediaTypes="$mediaTypes" />

        <x-table.table label="watched">
            @foreach ($user->media as $media)
            <x-table.row>
                <x-table.text href="/" text="{{ ucwords($media->name) }}" />
                <x-table.button action="/profile/{{ $user->username }}/{{ $media->id }}" method="DELETE" text="remove" />
            </x-table.row>
            @endforeach
        </x-table.table>

    </x-sidebar.home-sidebar>
    @endauth
</x-layout>
