<div class="lg:grid lg:grid-cols-12 px-6 py-8">
    <x-panel class="col-span-3 lg:pt-14 mb-10 mr-4">
        <p>Account Management: {{ auth()->user()->username }}</p>
        <x-sidebar.link url="home" str="Home"></x-sidebar.link>
        <x-sidebar.link url="account" str="Account Information"></x-sidebar.link>
        <x-sidebar.link url="clubs" str="Club Management"></x-sidebar.link>

    </x-panel>
    <x-panel class="col-span-9 lg:pt-14 mb-10">
        {{ $slot }}
    </x-panel>
</div>
