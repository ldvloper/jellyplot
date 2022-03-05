<div
    class="p-3 bg-gray-100 hover:bg-primary-color cursor-pointer text-sm focus:border-primary-color bg"

    wire:click.stop="selectValue('{{ $option['value'] }}')"
    x-bind:class="{ 'bg-primary-color text-white font-medium': selectedIndex === {{ $index }}, '{{ $styles['searchOptionItemInactive'] }}': selectedIndex !== {{ $index }} }"
    x-on:mouseover="selectedIndex = {{ $index }}"
>
    {{ $option['description'] }}
</div>
