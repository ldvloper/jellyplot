@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'text-primary-color transition'
                : 'transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
