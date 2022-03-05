<div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
    <div class="relative grid gap-6 bg-white dark:bg-gray-900 px-5 py-6 sm:gap-8 sm:p-8">

        <a href="{{route('equipment.index')}}" class="-m-3 p-3 flex items-start text-primary-color rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
            </svg>
            <div class="ml-4">
                <p class="text-base font-medium text-gray-900 dark:text-gray-200 capitalize">
                    {{__('view equipment')}}
                </p>
                <p class="mt-1 text-sm text-gray-500 dark:text-white ">
                    {{__('List the equipment associated with your department')}}
                </p>
            </div>
        </a>
        @if(auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'create'))
            <hr>
            <a href="{{ route('equipment.create') }}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary-color" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <div class="ml-4">
                    <p class="text-base font-medium text-gray-900 dark:text-gray-200 capitalize">
                        {{__('Add Equipment')}}
                    </p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-white">
                        {{__('Create new equipment associated with your department.')}}
                    </p>
                </div>
            </a>
        @endif

    </div>
</div>
