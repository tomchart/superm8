<x-layout>
    <x-sidebar.home-sidebar>
        <h1 class="font-bold underline text-lg">{{ ucwords($club->name) }}</h1>
        <p class="mt-6 mb-6">Current members:</p>
        @foreach ($club->users as $user)
        <li>{{ $user->name }}</li>
        @endforeach

        <div class="inline-flex">
            <!-- make this only for club owner with a Gate -->
            <a href="/admin/club/{{ $club->id }}/edit" class="mt-12 py-2 px-4 mr-8 hover:underline">edit club</a>

            <form method="POST" action="/invite/{{ $club->slug }}" class="">
                @csrf
                <div class="inline-flex">
                    <x-form.button>create invite</x-form.button>
                    @if (session()->has('invite'))
                    <p class="mt-14 ml-6">Invite code: {{ session('invite')->code }}</p>
                    @endif
                </div>
            </form>

        </div>

        <hr class="mt-6">

        <x-watchlist.main>

            <x-slot name="input">
                <form method="POST" action='/club/watchlist/{{ $club->id }}/' enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="lg:grid lg:grid-cols-12">
                        <div class="col-span-8">
                            <x-form.label name="add something" />
                            <x-form.input name="input" required />
                        </div>

                        <div class="inline-flex col-span-4">
                            <div class="relative bg-gray-200 rounded-xl space-y-2 lg:space-y-0 lg:space-x-4 block text-left px-3 col-span-2 ml-6 mr-6 mt-12 mb-6 py-2">
                                <p>need to redo dropdown</p>
                            </div>

                            <x-form.button>add</x-form.button>
                        </div>
                    </div>
                </form>
            </x-slot>

            <x-slot name="list">
                @foreach ($club->watchlists as $watchlists)
                @foreach ($watchlists->media as $media)
                <x-watchlist.item class="mt-8">{{ $media->name }}</x-watchlist.item>
                @endforeach
                @endforeach
            </x-slot>

        </x-watchlist.main>

    </x-sidebar.home-sidebar>
</x-layout>
