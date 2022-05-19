<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 text-black">
            <x-panel>
                <form method="POST" action="/login" class="mt-10">
                    @csrf
                    <x-form.input name="username" placeholder="username" required />
                    <x-form.input name="password" type="password" placeholder="" required />

                    <x-form.button>log in</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
