<x-layout>
    <form method="POST" action="/redeem" class="mt-10">
        @csrf
        <x-form.input name="invite_code" placeholder="enter code..." required />
        <div class="inline-flex">
            <x-form.button class="mt-2">redeem</x-form.button>
            @if (session()->has('success'))
            <p class="py-2 px-8 mt-6">{{ session('success') }}</p>
            @endif
        </div>
    </form>
</x-layout>
