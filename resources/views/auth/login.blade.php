<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500 transform transition duration-500 hover:scale-105" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Username -->
            <div>
                <x-label for="username" :value="__('Username')" />

                <x-form.input id="username" type="username" name="username" :value="old('username')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-form.input id="password" type="password" name="password" :value="old('password')" required autofocus />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-100">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-2">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-100 hover:text-gray-300 mt-4" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <x-form.button class="ml-3 inline-flex items-center">
                    {{ __('Log in') }}
                </x-form.button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
