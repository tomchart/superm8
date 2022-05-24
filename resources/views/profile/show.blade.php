<x-layout>
    @auth
    <p class="text-lg">{{ $user->name }}</p>
    <p class="mb-4 italic text-sm text-gray-500">{{ '@' . $user->username }}</p>
    <p class="text-sm">{{ $user->description }}</p>

    <div class="mt-12 mb-6 border-t border-gray-600"></div>

    @if (auth()->user()->id == $user->id)
    <div x-data="{ expanded: false }">
        <button @click="expanded = ! expanded" type="button" class="btn btn-outline btn-primary mr-4 mb-6">edit watched</button>
        <div x-show="expanded" x-collapse>
            <x-profile.add-watched :mediaTypes="$mediaTypes" :ratings="$ratings" />

            <x-table.table label="watched">
                @foreach ($user->media as $media)
                <x-table.row>
                    <x-table.media :media="$media" :ratings="$ratings" />
                    <x-table.button action="/profile/{{ $user->username }}/{{ $media->id }}" method="DELETE" text="remove" />
                </x-table.row>
                @endforeach
            </x-table.table>

            <div class="mt-6 mb-6 border-t border-gray-600"></div>
        </div>
    </div>
    @endif

    <x-watched :user="$user" />

    @endauth
</x-layout>
