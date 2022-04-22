<!doctype html>

<title>superm8</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-6">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/" class="font-semibold italic text-2xl hover:underline">superm8</a>
            </div>
            <div class="mt-8 md:mt-0 mr-6 flex items-center space-x-6">
                @auth
                <a href="/account" class="hover:underline">My Account</a>
                <a href="/logout" class="hover:underline">Log out</a>
                @else
                <a href="/login" class="hover:underline">Login</a>
                <a href="/register" class="hover:underline">Register</a>
                @endauth
            </div>

        </nav>

        {{ $slot }}

    </section>
</body>
