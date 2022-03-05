<div x-cloak  class="h-100" x-data="{show: false }" @mouseover.away = "show = false">
    <div class="relative" >
        <!-- Item active: "text-gray-900 dark:text-gray-200", Item inactive: "text-gray-500 dark:text-white" -->
        <button type="button" @mouseover="show = true" class="text-gray-500 dark:text-white dark:text-white group bg-transparent rounded-md inline-flex items-center text-base font-medium hover:text-primary-color focus:outline-none" aria-expanded="false">
            <x-navigation.anonymous.responsive-nav-link href="{{ route('resources.index') }}" :active="request()->routeIs('resources.*')">
                <span>{{__('Resources')}}</span>
            </x-navigation.anonymous.responsive-nav-link>
        </button>
        <div x-show="show" @click.away="show = false" class="absolute z-10 -ml-4 transform px-2 w-screen max-w-sm sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
            <x-navigation.options.links.resources-links/>
        </div>
    </div>
</div>
