<input
    id="{{ $name }}"
    name="{{ $name }}"
    type="text"
    placeholder="{{ $placeholder }}"
    class="w-full px-3 dark:text-white border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-md shadow-sm focus:outline-none focus:ring-primary-color focus:border-primary-color sm:text-sm"

    wire:keydown.enter.prevent=""
    wire:model.debounce.300ms="searchTerm"

    x-on:click="isOpen = true"
    x-on:keydown="isOpen = true"

    x-on:keydown.arrow-up="selectUp(@this)"
    x-on:keydown.arrow-down="selectDown(@this)"
    x-on:keydown.enter.prevent="confirmSelection(@this)"
/>
