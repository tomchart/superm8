<x-layout>
    <x-sidebar.home-sidebar>
        <h1 class="font-bold underline text-lg">{{ ucwords($club->name) }}</h1>
        <p class="mt-6 mb-6">Current members:</p>
        @foreach ($club->users as $user)
        <li>{{ $user->name }}</li>
        @endforeach

        <form method="POST" action="/invite/{{ $club->slug }}" class="mt-10">
            @csrf
            <div class="inline-flex">
                <x-form.button>create invite</x-form.button>
                @if (session()->has('invite'))
                <p class="py-2 px-8 mt-6">Invite code: {{ session('invite')->code }}</p>
                @endif
            </div>
        </form>

    </x-sidebar.home-sidebar>
</x-layout>
