<x-layout>

    <body style="font-family: Open Sans, sans-serif">
        <section class="px-6 py-8">
            <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
                <div>
                    @auth
                    <p>Welcome, {{ auth()->user()->name }}!</p>
                    @else
                    <p>Please log in to view content.</p>
                    @endauth
                </div>
            </main>

        </section>
    </body>
</x-layout>
