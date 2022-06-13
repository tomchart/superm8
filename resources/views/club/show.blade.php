<x-layout>
    <div class="relative">
        <h1 class="font-bold underline text-lg">{{ ucwords($club->name) }}</h1>
        <x-progress :value="$progress" />
        <p class="mt-6 mb-6">Current members:</p>
        @foreach ($club->users as $user)
        <x-user-card-hover :user="$user" />
        @endforeach
    </div>


    <div class="inline-flex">
        <!-- make this only for club owner with a Gate -->
        <x-link-button href="/admin/club/{{ $club->id }}/edit" class="btn-outline btn-secondary mt-10 mr-4" text="edit club" />

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

    @foreach ($club->watchlists as $watchlist)
    <h3 class="underline font-semibold mb-4 mt-4" id="list">{{ $watchlist->name }}</h3>
    <x-table.table>
        <x-slot name="head">
            <th></th>
            <th>Title</th>
            <th></th>
            <th></th>
        </x-slot>
        <x-slot name="row">
            @foreach ($watchlist->media as $media)
            <tr>
                <th></th>
                <td>
                    <div class="inline-flex">
                        <a class="hover:underline {{ $media->pivot->watched == 1 ? 'text-gray-400 line-through' : '' }}"
                            href="/media/{{ $media->id }}">{{ $media->Title }}
                        </a>
                        <x-rating.rating :media="$media" class="flex flex-row px-2 py-1.5" />
                    </div>
                </td>
                <th>
                    <x-table.media-watched-button :watchlist="$watchlist" :media="$media" />
                </th>
                <th>
                    <x-table.remove-media-button :watchlist="$watchlist" :media="$media" />
                </th>
            </tr>
            @endforeach
        </x-slot>
    </x-table.table>
    @endforeach

    <div class="mt-6 mb-6 border-t border-gray-600"></div>

    <div class="lg:grid lg:grid-cols-12">
        <section class="col-span-8" id="comments">
            <x-comment.add :club="$club" action="/club/{{ $club->id }}/comment" />
        </section>

        <section class="col-span-8 mt-10 space-y-6">
            @foreach ($comments as $comment)
            <x-comment.comment :comment="$comment" />
            @endforeach
        </section>
    </div>
    <x-comment.paginator :paginator="$comments" />


</x-layout>
