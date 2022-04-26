<x-layout>
    <x-sidebar.home-sidebar>
        <h1 class="font-bold underline text-lg">{{ ucwords($club->name) }}</h1>
        <p class="mt-6 mb-6">Current members:</p>
        @foreach ($club->users as $user)
        <li>{{ $user->name }}</li>
        @endforeach

        <div class="inline-flex">
            <!-- make this only for club owner with a Gate -->
            <a href="/admin/club/{{ $club->id }}/edit" class="mt-14 py-2 px-4 mr-8 hover:underline">edit club</a>

            <form method="POST" action="/invite/{{ $club->slug }}" class="mt-8">
                @csrf
                <div>
                    <x-form.button>create invite</x-form.button>
                    @if (session()->has('invite'))
                    <p class="py-2 px-8 mt-6">Invite code: {{ session('invite')->code }}</p>
                    @endif
                </div>
            </form>

        </div>

        <x-watchlist.main>

            <form class="mt-6 mb-6" method="POST" action='/club/watchlist/{{ $club->id }}/' enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <x-form.label name="add something" />
                <x-form.input name="input" required />

                <x-form.button>add</x-form.button>
            </form>

            <x-watchlist.item class="mt-8">Apocalypse Now</x-watchlist.item>

        </x-watchlist.main>

    </x-sidebar.home-sidebar>
</x-layout>
