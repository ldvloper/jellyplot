<div x-cloak x-data="{show: false }" class="relative">
    <!-- Item active: "text-gray-900 dark:text-gray-200", Item inactive: "text-gray-500 dark:text-white" -->
    <button type="button" @click="show = !show" class="text-gray-500 dark:text-white dark:text-white group bg-transparent rounded-md inline-flex items-center text-base font-medium hover:text-primary-color focus:outline-none" aria-expanded="false">
        <span>More</span>
        <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-primary-color" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </button>
    <div x-show="show" @click.away="show = false" class="absolute z-10 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-md sm:px-0">
        <x-navigation.options.links.more-links/>
    </div>
</div>

