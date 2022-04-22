<x-layout>
    <section class="px-6 py-8">
        <main class="">
            <div class="lg:grid lg:grid-cols-12">
                <x-panel class="col-span-2 lg:pt-14 mb-10 mr-4">
                    @auth
                    <p>Welcome, {{ auth()->user()->name }}!</p>

                    <p class="mt-4 mb-2">Your current clubs: </p>

                    @foreach (auth()->user()->clubs as $club)
                    <a href="/club/{{ $club->slug }}">
                        <li class="hover:underline">{{ ucwords($club->name) }}</li>
                    </a>
                    @endforeach

                    @else
                    <p class="mt-8">Please log in to view content.</p>
                    @endauth
                </x-panel>
                <x-panel class="col-span-10 lg:pt-14 mb-10">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et enim tincidunt, scelerisque quam eu, posuere diam. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc tristique finibus efficitur. Vivamus egestas lorem purus, at vestibulum tortor interdum eget. Donec nec sodales sapien, eu semper risus. Mauris rutrum dapibus justo, vestibulum elementum metus ullamcorper id. Mauris placerat semper velit ac mattis. In tortor leo, consectetur ut velit ut, vulputate egestas ipsum. Fusce gravida lectus quis lectus posuere egestas eget ac elit. Ut sit amet dolor rutrum, condimentum justo non, interdum nunc.</p>
                    <p class="mt-8">Integer interdum ante nulla, sollicitudin consequat nulla lacinia at. Vivamus vestibulum mauris odio. Aenean hendrerit ultricies nibh. Praesent pretium consectetur purus, eu volutpat erat tincidunt ac. Praesent tellus ipsum, hendrerit at vulputate vitae, ultricies quis massa. Sed varius dignissim ornare. Integer ultricies, justo a bibendum maximus, elit augue sagittis nunc, a elementum ipsum ex ut elit. Aliquam dapibus, leo eget tincidunt dignissim, massa massa lobortis tortor, in pharetra turpis dui non arcu. Nam diam tortor, volutpat ut ullamcorper ac, suscipit vel augue. Ut orci purus, dictum vel leo eget, feugiat maximus dolor.</p>
                </x-panel>
            </div>
        </main>
    </section>
</x-layout>
