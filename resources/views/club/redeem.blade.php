<x-layout>
    <x-sidebar.home-sidebar>
        <form method="POST" action="/redeem" class="mt-10">
            @csrf
            <x-form.label name="invite code" required />
            <x-form.input name="invite_code" required />
            <div class="inline-flex">
                <x-form.button>redeem code</x-form.button>
                @if (session()->has('success'))
                <p class="py-2 px-8 mt-6">{{ session('success') }}</p>
                @endif
            </div>
        </form>
    </x-sidebar.home-sidebar>
</x-layout>
