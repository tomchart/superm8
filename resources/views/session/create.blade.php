<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <form method="POST" action="/login" class="mt-10">
                    @csrf
                    <x-form.input name="username" autocomplete="username" required />
                    <x-form.input name="password" type="password" autocomplete="new-password" required />
                    <x-form.button>Log in</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
