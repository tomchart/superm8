<x-sidebar.main>
    <x-slot:side>
        <p>Account Management: {{ auth()->user()->username }}</p>
        <x-sidebar.link url="home" str="Home"></x-sidebar.link>
        <x-sidebar.link url="account" str="Account Information"></x-sidebar.link>
        <x-sidebar.link url="clubs" str="Club Management"></x-sidebar.link>
    </x-slot:side>

    {{ $slot }}
</x-sidebar.main>
