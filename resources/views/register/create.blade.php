<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <form method="POST" action="/register" class="mt-10">
                    @csrf
                    <x-form.label name="name" required />
                    <x-form.input name="name" placeholder="" required />

                    <x-form.label name="username" required />
                    <x-form.input name="username" placeholder="" required />

                    <x-form.label name="email" required />
                    <x-form.input name="email" type="email" placeholder="" required />

                    <x-form.label name="password" required />
                    <x-form.input name="password" type="password" autocomplete="new-password" placeholder="" required />
                    <x-form.button>register</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
