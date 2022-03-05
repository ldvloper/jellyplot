<div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
    <div class="relative grid gap-6 bg-white dark:bg-gray-900 px-5 py-6 sm:gap-8 sm:p-8">
        <a href="{{ route('planning.show') }}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
            <!-- Heroicon name: outline/cursor-click -->
            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-6 text-primary-color" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div class="ml-4">
                <p class="text-base font-medium text-gray-900 dark:text-gray-200">
                    {{__('View Planning')}}
                </p>
                <p class="mt-1 text-sm text-gray-500 dark:text-white">
                    {{__('Create, manage and check the rooms availability')}}
                </p>
            </div>
        </a>
        <hr>
        <a href="{{ route('tasks.create') }}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-color" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            <div class="ml-4">
                <p class="text-base font-medium text-gray-900 dark:text-gray-200 capitalize">
                    {{__('Add Task')}}
                </p>
                <p class="mt-1 text-sm text-gray-500 dark:text-white">
                   Create a new task and associate it with a resource.
                </p>
            </div>
        </a>

        <a href="" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-color" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
            </svg>
            <div class="ml-4">
                <p class="text-base font-medium text-gray-900 dark:text-gray-200 capitalize">
                    {{__('Share or Export')}}
                </p>
                <p class="mt-1 text-sm text-gray-500 dark:text-white">
                   Share and Export the planner.
                </p>
            </div>
        </a>

    </div>
    <!--<div class="px-5 py-5 bg-gray-50 dark:bg-gray-900 space-y-6 sm:flex sm:space-y-0 sm:space-x-10 sm:px-8">
        <div class="flow-root">
            <span class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
                <x-jet-label for="search" value="{{ __('Fast Search') }}" />
                  <x-jet-input id="search" type="text" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="search" />
                <x-jet-input-error for="search" class="mt-2" />
            </span>
        </div>
    </div>-->
</div>
