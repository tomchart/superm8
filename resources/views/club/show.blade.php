<x-layout>
    <x-sidebar.home-sidebar>
        <h1 class="font-bold underline text-lg">{{ ucwords($club->name) }}</h1>
        <p class="mt-6 mb-6">Current members:</p>
        @foreach ($club->users as $user)
        <a href="/profile/{{ $user->username }}" class="hover:underline">
            <li>{{ $user->username }}</li>
        </a>
        @endforeach

        <div class="inline-flex">
            <!-- make this only for club owner with a Gate -->
            <a href="/admin/club/{{ $club->id }}/edit" class="btn btn-outline btn-secondary mt-10 mr-4">edit club</a>


            <form method="POST" action="/invite/{{ $club->slug }}" class="">
                @csrf
                <div class="inline-flex">
                    <x-form.button class="btn-secondary mt-4">create invite</x-form.button>
                    @if (session()->has('invite'))
                    <p class="mt-14 ml-6">Invite code: {{ session('invite')->code }}</p>
                    @endif
                </div>
            </form>

        </div>

        <x-watchlist.main>
            <x-slot name="new">
                <x-watchlist.create :club="$club" />
            </x-slot>

            <x-slot name="input">
                <x-watchlist.update :club="$club" :mediaTypes="$mediaTypes" :ratings="$ratings" />
            </x-slot>
        </x-watchlist.main>

        <div class="mt-6 mb-6 border-t border-gray-600"></div>
        <x-watchlist.list :club="$club" />

    </x-sidebar.home-sidebar>
</x-layout>
