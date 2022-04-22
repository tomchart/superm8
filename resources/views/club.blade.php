<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10">
            <x-panel>
                <h1 class="font-bold underline text-lg">{{ ucwords($club->name) }}</h1>
                <p class="mt-6 mb-6">Current members:</p>
                @foreach ($club->users as $user)
                <li>{{ $user->name }}</li>
                @endforeach
            </x-panel>
        </main>
    </section>
</x-layout>
