<div class="hidden lg:flex justify-center items-center">
@if(Laravel\Jetstream\Jetstream::hasTeamFeatures())
    <div class="mx-3 relative hidden lg:block">
        <x-jet-dropdown align="right" width="60">
            <x-slot name="trigger">
                <span class="inline-flex rounded-md">
                    <button type="button" class="inline-flex items-center text-base font-medium text-gray-500 dark:text-white dark:text-white hover:text-primary-color">
                        Team: {{ Auth::user()->currentTeam->name }}
                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </span>
            </x-slot>

            <x-slot name="content">
                <div class="w-60">
                    <!--Block: Team Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                        {{ __('Team Settings') }}
                    </x-jet-dropdown-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                            {{ __('Create New Team') }}
                        </x-jet-dropdown-link>
                    @endcan

                    <div class="border-t border-gray-100"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Team') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                            <x-jet-switchable-team :team="$team" />
                    @endforeach

                </div>
            </x-slot>
        </x-jet-dropdown>
    </div>
@endif
<!--User Info-->
<x-jet-dropdown align="right" width="48">
    <x-slot name="trigger">
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                <img class="h-8 w-8 rounded-full object-cover" src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}" />
            </button>
        @else
            <span class="inline-flex rounded-md">
                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-white bg-transparent hover:text-primary-color focus:outline-none transition">
                        {{ auth()->user()->name }}

                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </span>
        @endif
    </x-slot>

    <x-slot name="content">

    <!--This is master management, only the directors and the admin have acces-->
        @if((auth()->user()->master) || (auth()->user()->email === config('app.admin_email')))
            <!-- Users Management -->
            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Master Management') }}
            </div>
            <x-jet-dropdown-link href="{{ route('users.index') }}">
                <span class="flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="px-2">{{ __('Users') }}</span>
                </span>
            </x-jet-dropdown-link>
            <x-jet-dropdown-link href="{{ route('positions.index') }}">
                <span class="flex items-center">
                   <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                    </svg>
                    <span class="px-2">{{ __('Positions') }}</span>
                </span>
            </x-jet-dropdown-link>
            <x-jet-dropdown-link href="{{ route('scheduler.index') }}">
               <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                    <span class="px-2">{{ __('Scheduler') }}</span>
                </span>
            </x-jet-dropdown-link>
            <x-jet-dropdown-link href="{{ route('shifts.index') }}">
                <span class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span class="px-2">{{ __('Shifts') }}</span>
                </span>
            </x-jet-dropdown-link>

        @endif
        <!-- Account Management -->
        <div class="block px-4 py-2 text-xs text-gray-400">
            {{ __('Manage Account') }}
        </div>

        <x-jet-dropdown-link href="{{ route('profile.show') }}">
            {{ __('Profile') }}
        </x-jet-dropdown-link>

        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                {{ __('API Tokens') }}
            </x-jet-dropdown-link>
        @endif

        <div class="border-t border-gray-100"></div>

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-jet-dropdown-link href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
               {{ __('Log Out') }}
            </x-jet-dropdown-link>
        </form>
    </x-slot>
</x-jet-dropdown>
</div>
