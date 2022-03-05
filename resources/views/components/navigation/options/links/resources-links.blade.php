<div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
    <div class="relative grid gap-6 bg-white dark:bg-gray-900 px-5 py-6 sm:gap-8 sm:p-8">
        <a href="{{ route('resources.index') }}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-6 text-primary-color" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
            <div class="ml-4">
                <p class="text-base font-medium text-gray-900 dark:text-gray-200 capitalize">
                    {{__('View resources')}}
                </p>
                <p class="mt-1 text-sm text-gray-500 dark:text-white">
                    {{__('Display a list of all Rooms associated with your department.')}}
                </p>
            </div>
        </a>
        @if(auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'create'))
            <hr>
            <a href="{{ route('resources.create') }}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-6 text-primary-color" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                </svg>
                <div class="ml-4">
                    <p class="text-base font-medium text-gray-900 dark:text-gray-200 capitalize">
                        {{__('Add Resource')}}
                    </p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-white">
                        Create a new task and associate it with a resource.
                    </p>
                </div>
            </a>
        @endif

    </div>
</div>
