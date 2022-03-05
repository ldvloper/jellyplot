<div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
    <div class="relative grid gap-6 bg-white dark:bg-gray-900 px-5 py-6 sm:gap-8 sm:p-8">
        <a href="{{route('analytics')}}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
            <!-- Heroicon name: outline/chart-bar -->
            <svg class="flex-shrink-0 h-6 w-6 text-primary-color" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
            <div class="ml-4">
                <p class="text-base font-medium text-gray-900 dark:text-gray-200">
                    Analytics
                </p>
                <p class="mt-1 text-sm text-gray-500 dark:text-white">
                    Get and export laboratories, projects and users data.
                </p>
            </div>
        </a>

        <a href="{{route('analytics')}}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
            <!-- Heroicon name: outline/chart-bar -->
            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-6 text-primary-color" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <div class="ml-4">
                <p class="text-base font-medium text-gray-900 dark:text-gray-200 capitalize">
                    {{__('calendar')}}
                </p>
                <p class="mt-1 text-sm text-gray-500 dark:text-white">
                    Get and export laboratories, projects and users data.
                </p>
            </div>
        </a>


        <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
            <!-- Heroicon name: outline/shield-check -->
            <svg class="flex-shrink-0 h-6 w-6 text-primary-color" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
            <div class="ml-4">
                <p class="text-base font-medium text-gray-900 dark:text-gray-200">
                    Security
                </p>
                <p class="mt-1 text-sm text-gray-500 dark:text-white">
                    Your data will be safe and secure.
                </p>
            </div>
        </a>

        <a href="{{route('integration')}}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
            <!-- Heroicon name: outline/view-grid -->
            <svg class="flex-shrink-0 h-6 w-6 text-primary-color" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
            <div class="ml-4">
                <p class="text-base font-medium text-gray-900 dark:text-gray-200">
                    Integrations
                </p>
                <p class="mt-1 text-sm text-gray-500 dark:text-white">
                    Connect the {{ config('app.name', 'Jellyplot') }} API with third-party tools, or use it in other projects.
                </p>
            </div>
        </a>




        <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
            <!-- Heroicon name: outline/refresh -->
            <svg class="flex-shrink-0 h-6 w-6 text-primary-color" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
            <div class="ml-4">
                <p class="text-base font-medium text-gray-900 dark:text-gray-200">
                    Automations
                </p>
                <p class="mt-1 text-sm text-gray-500 dark:text-white">
                    Build strategic funnels that will drive your customers to convert
                </p>
            </div>
        </a>
    </div>
</div>
