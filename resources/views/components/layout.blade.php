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

    [x-cloak] {
        display: none !important;
    }
</style>

<body style="font-family: Open Sans, sans-serif" class="bg-base-100 text-white">
    <div class="drawer">
        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <x-navbar />
            @auth
            <x-panel class="lg:pt-14 ml-56 mr-56 mt-6 mb-2">
                {{ $slot }}
            </x-panel>
            @else
            {{ $slot }}
            @endauth
            <div class="ml-2 mr-2">
                <x-flash />
            </div>
        </div>
        <x-drawer-side />
    </div>
</body>

</html>
