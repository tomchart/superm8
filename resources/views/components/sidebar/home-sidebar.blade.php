<x-sidebar.main>
    <x-slot:side>
        @auth
        <p>Welcome, {{ auth()->user()->name }}!</p>
        <x-sidebar.link url="home" str="Home"></x-sidebar.link>
        <x-sidebar.link url="profile/{{ auth()->user()->username }}" str="My Profile"></x-sidebar.link>
        <x-sidebar.link url="club" str="Create a new club"></x-sidebar.link>
        <x-sidebar.link url="redeem" str="Redeem an invite"></x-sidebar.link>
        <p class="mt-4 mb-2">Your current clubs: </p>

        @foreach (auth()->user()->clubs as $club)
        <x-sidebar.link url="club/{{ $club->slug }}" str="{{ ucwords($club->name) }}"></x-sidebar.link>
        @endforeach

        @else
        <p>Please log in to view content.</p>

        @endauth
    </x-slot:side>

    {{ $slot }}
</x-sidebar.main>
