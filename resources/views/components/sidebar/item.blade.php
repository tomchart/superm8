@props (['active' => false])

@php
$classes = 'block text-left px-3 text-sm leading-6 hover:underline focus:underline';
if ($active) $classes .= ' font-semibold';

@endphp

<a {{ $attributes(["class" => $classes]) }}>
    {{ $slot }}</a>
