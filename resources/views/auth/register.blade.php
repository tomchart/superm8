<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500 transform transition duration-500 hover:scale-105" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-form.input id="name" type="name" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Username -->
            <div class="mt-2">
                <x-label for="username" :value="__('Username')" />

                <x-form.input id="username" type="username" name="username" :value="old('username')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-2">
                <x-label for="email" :value="__('Email')" />

                <x-form.input id="email" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-2">
                <x-label for="password" :value="__('Password')" />

                <x-form.input id="password" type="password" name="password" :value="old('password')" required autofocus />
            </div>

            <!-- Confirm Password -->
            <div class="mt-2">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-form.input id="password_confirmation" type="password" name="password_confirmation" :value="old('password_confirmation')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-2">
                <a class="underline text-sm text-gray-100 hover:text-gray-300 mt-4" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-form.button class="ml-3 inline-flex items-center">
                    {{ __('Register') }}
                </x-form.button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
