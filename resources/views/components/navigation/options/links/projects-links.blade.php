<div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
    <div class="relative grid gap-6 bg-white dark:bg-gray-900 px-5 py-6 sm:gap-8 sm:p-8">

        <a href="{{route('projects.index')}}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-color" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            <div class="ml-4">
                <p class="text-base font-medium text-gray-900 dark:text-gray-200 capitalize">
                    {{__('view Projects')}}
                </p>
                <p class="mt-1 text-sm text-gray-500 dark:text-white ">
                    {{__('List the projects associated with your department')}}
                </p>
            </div>
        </a>
        <a href="{{route('tasks.index')}}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-6 text-primary-color" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
            <div class="ml-4">
                <p class="text-base font-medium text-gray-900 dark:text-gray-200 capitalize">
                    {{__('tasks')}}
                </p>
                <p class="mt-1 text-sm text-gray-500 dark:text-white">
                    {{__('Display a full resources tasks list and manage them.')}}
                </p>
            </div>
        </a>

        <a href="{{route('customers.index')}}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-6 text-primary-color" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <div class="ml-4">
                <p class="text-base font-medium text-gray-900 dark:text-gray-200 capitalize">
                    {{__('customers')}}
                </p>
                <p class="mt-1 text-sm text-gray-500 dark:text-white">
                    {{__('Display the customers information and manage them.')}}
                </p>
            </div>
        </a>
        @if(auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'create'))
            <hr>
            <a href="{{ route('projects.create') }}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary-color" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <div class="ml-4">
                    <p class="text-base font-medium text-gray-900 dark:text-gray-200 capitalize">
                        {{__('Add Project')}}
                    </p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-white">
                        {{__('Create a new project associated with your department.')}}
                    </p>
                </div>
            </a>

            <a href="{{route('customers.create')}}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-6 text-primary-color" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                <div class="ml-4">
                    <p class="text-base font-medium text-gray-900 dark:text-gray-200 capitalize">
                        {{__('add customer')}}
                    </p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-white">
                        {{__('Add new customer associated with your department.')}}
                    </p>
                </div>
            </a>
        @endif

    </div>
</div>
