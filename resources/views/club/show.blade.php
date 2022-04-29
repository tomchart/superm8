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
            <x-slot name="new">
                <form method="POST" action='/watchlist/{{ $club->id }}/create' enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="lg:grid lg:grid-cols-12">
                        <div class="col-span-8">
                            <x-form.label name="watchlist name" />
                            <x-form.input name="name" required />

                        </div>

                        @error('watchlist')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror

                        <div class="inline-flex col-span-4 ml-4">
                            <x-form.button>add</x-form.button>
                        </div>

                    </div>
                </form>
            </x-slot>

            <x-slot name="input">
                <form method="POST" action='/watchlist/{{ $club->id }}/' enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="lg:grid lg:grid-cols-12">
                        <div class="col-span-8">
                            <x-form.label name="add something" />
                            <x-form.input name="name" required />
                        </div>

                        <div class="inline-flex col-span-4">
                            <select name="type_id" id="type_id" class="mt-4 ml-4 mr-4">
                                @php
                                $media_types = \App\Models\MediaType::all();
                                @endphp

                                @foreach ($media_types as $type)
                                <option value="{{ $type->id }}">{{ ucwords($type->type) }}</option>
                                @endforeach
                            </select>

                            <select name="watchlist_id" id="watchlist_id" class="mt-4 ml-4 mr-4">
                                @php
                                $watchlists = $club->watchlists;
                                @endphp

                                @foreach ($watchlists as $watchlist)
                                <option value="{{ $watchlist->id }}">{{ ucwords($watchlist->name) }}</option>
                                @endforeach
                            </select>

                            <x-form.button>add</x-form.button>
                        </div>

                    </div>
                </form>
            </x-slot>

            <x-slot name="list">
                @foreach ($club->watchlists as $watchlist)
                <h3 class="underline font-semibold mb-2">{{ $watchlist->name }}</h3>
                @foreach ($watchlist->media as $media)
                <x-watchlist.item class="mt-8">{{ ucwords($media->name) }}</x-watchlist.item>
                @endforeach
                <hr class="mt-6 mb-6">
                @endforeach
            </x-slot>

        </x-watchlist.main>

    </x-sidebar.home-sidebar>
</x-layout>
