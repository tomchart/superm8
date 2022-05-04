<x-layout>
    @auth
    <x-sidebar.home-sidebar>
        <p class="text-lg">{{ $user->name }}</p>
        <p class="mb-4 italic text-sm text-gray-500">{{ '@' . $user->username }}</p>
        <p class="text-sm">{{ $user->description }}</p>

        <hr class="mt-12 mb-6" />

        <h2 class="font-bold underline text-lg">watched</h2>
        <x-profile.add-watched :mediaTypes="$mediaTypes" />

        @foreach ($user->watched as $media)
        <li>{{ ucwords($media->name) }}</li>
        @endforeach
    </x-sidebar.home-sidebar>
    @endauth
</x-layout>
