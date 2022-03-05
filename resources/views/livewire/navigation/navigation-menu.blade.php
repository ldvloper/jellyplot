<div class="relative bg-white dark:bg-black">
    <div class="hidden lg:block mx-auto px-4 sm:px-6">
        @if(auth()->user()->currentTeam->department)
            <div class="hidden md:flex md:justify-end md:px-5 pt-3">
                <button wire:click="search()" class="flex text-gray-400">
                    <x-navigation.magic-tool/>
                </button>
            </div>
        @endif
        <div class="flex z-50 justify-between items-center border-b-2 border-gray-100 dark:border-gray-900 py-6 md:justify-start md:space-x-10">
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <x-jet-application-logo />
                @if((auth()->user()->currentTeam)->department)
                    <h1 class="text-xl pt-5 text-primary-color font-bold">
                        {{(auth()->user()->currentTeam)->department->name_show}}
                    </h1>
                @endif
            </div>
            <div class="-mr-2 -my-2 md:hidden">
                <button type="button" class="bg-transparent rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-primary-color hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
                    <span class="sr-only">Open menu</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <nav class="hidden md:flex space-x-14">
                <!--Main Jellyplot -->
                @if((auth()->user()->currentTeam)->department)
                    <x-navigation.options.planning/>
                    <x-navigation.options.projects/>
                    <x-navigation.options.resources/>
                    <x-navigation.options.equipment/>
                    <x-navigation.options.more/>
                @endif
            </nav>
            @if(auth()->check())
                <x-navigation.auth.auth/>
            @endif
        </div>
    </div>
    <x-mobile.navigation.navigation/>
</div>
