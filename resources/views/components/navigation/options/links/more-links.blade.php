<div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
    <div class="relative grid gap-6 bg-white dark:bg-gray-900 px-5 py-6 sm:gap-8 sm:p-8">
        <a href="{{ route('help.index') }}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:bg-gray-800">
            <!-- Heroicon name: outline/support -->
            <svg class="flex-shrink-0 h-6 w-6 text-primary-color" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <div class="ml-4">
                <p class="text-base font-medium text-gray-900 dark:text-gray-200">
                    Help Center
                </p>
                <p class="mt-1 text-sm text-gray-500 dark:text-white">
                    Get all of your questions answered in our forums or contact support.
                </p>
            </div>
        </a>
        <a href="{{ route('docs') }}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:bg-gray-800">
            <!-- Heroicon name: outline/bookmark-alt -->
            <svg class="flex-shrink-0 h-6 w-6 text-primary-color" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <div class="ml-4">
                <p class="text-base font-medium text-gray-900 dark:text-gray-200">
                    Documentation
                </p>
                <p class="mt-1 text-sm text-gray-500 dark:text-white">
                    Check the {{config('app.name')}} documentation, see how it works and resolve your doubts.
                </p>
            </div>
        </a>

        <a href="#" class="text-primary-color -m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:bg-gray-800">
            <!-- Heroicon name: outline/calendar -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
            <div class="ml-4">
                <p class="text-base font-medium text-gray-900 dark:text-gray-200">
                    Downloads
                </p>
                <p class="mt-1 text-sm text-gray-500 dark:text-white">
                    {{config('app.name')}} applications and software to download.
                </p>
            </div>
        </a>

        <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:bg-gray-800">
            <!-- Heroicon name: outline/shield-check -->
            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-6 text-primary-color" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div class="ml-4">
                <p class="text-base font-medium text-gray-900 dark:text-gray-200">
                    Report
                </p>
                <p class="mt-1 text-sm text-gray-500 dark:text-white">
                   Report bugs, issues and possible upgrades.
                </p>
            </div>
        </a>
    </div>
    <div class="px-5 py-5 bg-gray-50 dark:bg-gray-900 sm:px-8 sm:py-8">
        <div>
            <h3 class="text-sm tracking-wide font-medium text-gray-500 dark:text-white uppercase">
                FAQ
            </h3>
            <ul role="list" class="mt-4 space-y-4">
                <li class="text-base truncate">
                    <a href="{{route('faq')}}" class="font-medium text-gray-900 dark:text-gray-200 hover:text-primary-color">
                       Why I need to create a new account?
                    </a>
                </li>

                <li class="text-base truncate">
                    <a href="{{route('faq')}}" class="font-medium text-gray-900 dark:text-gray-200 hover:text-primary-color">
                        How to link my social networks with my account
                    </a>
                </li>

                <li class="text-base truncate">
                    <a href="{{route('faq')}}" class="font-medium text-gray-900 dark:text-gray-200 hover:text-primary-color">
                        How to increase the security of my account
                    </a>
                </li>
            </ul>
        </div>
        <div class="mt-5 text-sm">
            <a href="{{route('faq')}}" class="font-medium text-primary-color hover:text-yellow-900"> View all FAQ's <span aria-hidden="true">&rarr;</span></a>
        </div>
    </div>
</div>
