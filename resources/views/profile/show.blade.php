<x-layout>
    @auth
    <x-sidebar.home-sidebar>
        <p class="mb-6">{{ $user->username }}</p>

        <hr class="mt-6 mb-6" />

        <x-profile.add-watched :mediaTypes="$mediaTypes" />

        @foreach ($user->watched as $media)
        <li>{{ ucwords($media->name) }}</li>
        @endforeach
    </x-sidebar.home-sidebar>
    @endauth
</x-layout>
