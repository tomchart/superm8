<x-layout>
    <section class="px-6 py-8">
        <main class="">
            @auth
            <x-sidebar.account-sidebar>
                <p>account info</p>
            </x-sidebar.account-sidebar>
            @endauth
        </main>
    </section>
</x-layout>
