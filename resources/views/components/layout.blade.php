<!doctype html>

<html data-theme="dracula">

<title>superm8</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<!-- Alpine Plugins -->
<script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
<!-- Alpine Core -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif" class="bg-base-100 text-white">
    <section class="">
        <nav class="text-black">
            <div class="navbar bg-secondary">
                <div class="flex-1">
                    <a href="/" class="btn btn-ghost normal-case text-xl italic ml-4">superm8</a>
                </div>
                @auth
                <div class="flex-none">
                    <ul class="menu menu-horizontal p-0 mr-4">
                        <li tabindex="0">
                            <a class="mr-4">
                                {{ auth()->user()->username }}
                                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                                </svg>
                            </a>
                            <ul class="p-2 bg-secondary-focus">
                                <li><a href="/account">account information</a></li>
                                <li><a href="/clubs">club management</a></li>
                            </ul>
                        </li>
                        <li><a href="/logout">logout</a></li>
                    </ul>
                </div>
                @endauth
            </div>
            <!-- <div class="navbar bg-primary text-primary-content"> -->
            <!--     <a href="/" class="btn btn-ghost normal-case text-xl italic" hover:underline>superm8</a> -->
            <!-- </div> -->
            <!-- <div class="mt-8 md:mt-0 mr-6 flex items-center space-x-6"> -->
            <!--     @auth -->
            <!--     <a href="/account" class="hover:underline">My Account</a> -->
            <!--     <a href="/logout" class="hover:underline">Log out</a> -->
            <!--     @else -->
            <!--     <a href="/login" class="hover:underline">Login</a> -->
            <!--     <a href="/register" class="hover:underline">Register</a> -->
            <!--     @endauth -->
            <!-- </div> -->
            <!---->
        </nav>

        {{ $slot }}

    </section>
</body>

</html>
