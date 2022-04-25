@props (['url', 'str'])
<div class="mt-2">
    <x-sidebar.item href="/{{ $url }}" :active='request()->is("{$url}")'>{{ $str }}</x-sidebar.item>
</div>
