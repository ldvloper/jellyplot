@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-primary-color text-base font-medium text-primary-color bg-gray-200 focus:outline-none focus:text-primary-color focus:bg-secondary-color focus:border-indigo-700 transition'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-white hover:text-primary-color hover:bg-gray-100 dark:hover:bg-secondary-color hover:border-primary-color focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
