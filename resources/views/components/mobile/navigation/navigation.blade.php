<div x-data="{show: false }" class="relative z-50 top-0 inset-x-0 p-2 transform origin-top-right lg:hidden">
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white dark:bg-gray-800 divide-y-2 divide-gray-50">
            <div class="pt-5 pb-6 px-5">
                <div class="flex items-center justify-between">
                    <div>
                        <x-jet-application-logo />
                    </div>
                    <div class="-mr-2">
                        <button type="button" @click="show = !show" class="bg-transparent rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-primary-color focus:bg-transparent focus:outline-none focus:ring-2 focus:ring-inset focus:ring-yellow-500">
                            <span x-show="!show" class="sr-only">Open menu</span>
                            <span x-show="show" class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': show, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                <path :class="{'hidden': ! show, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div x-cloak x-show="show" class="relative z-50">
                    <div class="mt-6">
                        @if(auth()->user()->currentTeam->department)
                            <nav class="grid gap-y-8">
                                <button wire:click="search()" class="flex text-gray-400">
                                    <x-navigation.magic-tool/>
                                </button>
                                <hr>
                                <a href="{{ route('planning.show') }}" class="text-primary-color -m-3 p-3 flex items-center rounded-md hover:bg-gray-50 dark:hover:bg-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="ml-3 text-base font-medium text-gray-900 dark:text-gray-200">
                                            {{__('Planning')}}
                                    </span>
                                </a>

                                 <a href="{{ route('tasks.index') }}" class="text-primary-color -m-3 p-3 flex items-center rounded-md hover:bg-gray-50 dark:hover:bg-gray-900">
                                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                     </svg>
                                    <span class="ml-3 text-base font-medium text-gray-900 dark:text-gray-200">
                                            {{__('Tasks')}}
                                    </span>
                                </a>


                                <a href="{{route('projects.index')}}" class="text-primary-color -m-3 p-3 flex items-center rounded-md hover:bg-gray-50 dark:hover:bg-gray-900">
                                    <!-- Heroicon name: outline/cursor-click -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                    <span class="ml-3 text-base font-medium text-gray-900 dark:text-gray-200">
                                            {{__('Projects')}}
                                    </span>
                                </a>

                                <a href="{{route('customers.index')}}" class="text-primary-color -m-3 p-3 flex items-center rounded-md hover:bg-gray-50 dark:hover:bg-gray-900">
                                    <!-- Heroicon name: outline/cursor-click -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                    <span class="ml-3 text-base font-medium text-gray-900 dark:text-gray-200">
                                            {{__('Customers')}}
                                    </span>
                                </a>

                                <a href="{{route('resources.index')}}" class="text-primary-color -m-3 p-3 flex items-center rounded-md hover:bg-gray-50 dark:hover:bg-gray-900">
                                    <svg class="flex-shrink-0 h-6 w-6 text-primary-color" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                    </svg>
                                    <span class="ml-3 text-base font-medium text-gray-900 dark:text-gray-200">
                                            Resources
                                    </span>
                                </a>
                                <a href="{{route('equipment.index')}}" class="text-primary-color -m-3 p-3 flex items-center rounded-md hover:bg-gray-50 dark:hover:bg-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                                    </svg>
                                    <span class="ml-3 text-base font-medium text-gray-900 dark:text-gray-200">
                                        {{__('Equipment')}}
                                    </span>
                                </a>
                            </nav>
                            @endif
                    </div>
                    <div class="relative z-50 py-12 px-5 space-y-6">
                        <div class="grid grid-cols-2 gap-y-4 gap-x-8">
                            @if(auth()->user()->master)
                                <a href="{{route('users.index')}}" class="text-base font-medium text-gray-900 dark:text-gray-200 hover:text-yellow-700">
                                    Users
                                </a>
                            @endif
                            @if(auth()->user()->currentTeam->department)
                                <a href="#" class="text-base font-medium text-gray-900 dark:text-gray-200 hover:text-yellow-700">
                                    Stats
                                </a>

                                <a href="" class="text-base font-medium text-gray-900 dark:text-gray-200 hover:text-yellow-700">
                                    Pricing & Costs
                                </a>

                                <a href="#" class="text-base font-medium text-gray-900 dark:text-gray-200 hover:text-yellow-700">
                                    Users
                                </a>

                                <a href="#" class="text-base font-medium text-gray-900 dark:text-gray-200 hover:text-yellow-700">
                                    More
                                </a>
                            @endif
                                <a href="{{ route('docs') }}" class="text-base font-medium text-gray-900 dark:text-gray-200 hover:text-yellow-700">
                                    Documentation
                                </a>

                                <a href="{{ route('help.index') }}" class="text-base font-medium text-gray-900 dark:text-gray-200 hover:text-yellow-700">
                                    Help Center
                                </a>


                        </div>
                    </div>
                    <div class="bg-white dark:bg-gray-900 rounded-lg py-6 px-5 space-y-6">
                        @if(Auth::guest())
                            <a href="{{url('/login')}}" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-yellow-600 hover:bg-yellow-500">
                                Sign in
                            </a>
                            <p class="mt-6 text-center text-base font-medium text-gray-500 dark:text-white">
                                Existing customer?
                                <a href="{{url('/register')}}" class="text-primary-color hover:text-yellow-700">
                                    Sign up
                                </a>
                            </p>
                        @elseif(Auth::check())
                            <!-- Team Management -->
                            <div class="py-2 items-center bg-gray-100 dark:bg-gray-800 border-gray-600 rounded-md">
                                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())

                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Space') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')" cal>
                                        {{ __('Space Settings') }}
                                    </x-jet-responsive-nav-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                            {{ __('Create New Space') }}
                                        </x-jet-responsive-nav-link>
                                    @endcan

                                    <div class="border-t border-gray-200"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Space') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                                    @endforeach
                                @endif
                            </div>
                            <div class="py-2 flex items-center px-4 bg-transparent">
                                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <div class="flex-shrink-0 mr-3">
                                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                        </div>
                                    @endif

                                    <div>
                                        <div class="font-medium text-base text-gray-800 dark:text-white ">{{ Auth::user()->name }}</div>
                                        <div class="font-medium text-sm text-gray-500 dark:text-gray-100">{{ Auth::user()->email }}</div>
                                    </div>
                                </x-jet-responsive-nav-link>
                            </div>
                            <div class="border-t border-gray-200"></div>
                            <div class="py-2 flex items-center px-4 bg-transparent">
                                <div class="space-y-1">

                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                            {{ __('API Tokens') }}
                                        </x-jet-responsive-nav-link>
                                    @endif

                                <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                            <div class="flex ">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                                </svg>
                                                <span class="pl-2">{{ __('Log Out') }}</span>
                                            </div>
                                        </x-jet-responsive-nav-link>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
