<div class="lg:flex lg:items-center lg:justify-between">
    <div class="flex-1 min-w-0">
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate capitalize">
            {{ $title }}
        </h2>
        <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
            @if($object->department)
                <div class="mt-2 flex items-center text-sm text-gray-500">
                    <!-- Heroicon name: solid/briefcase -->
                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                    {{ $object->department->name_show }}
                </div>
            @endif
            @if($object->creator)
                <div class="group mt-2 text-sm text-gray-500">
                    <a class="flex items-center group-hover:text-primary-color" href="{{route('users.show', $object->creator->id)}}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 mr-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                        </svg>
                        {{ $object->creator->name }}
                    </a>
                </div>
            @endif
            <div class="mt-2 flex items-center text-sm text-gray-500">
                <!-- Heroicon name: solid/calendar -->
                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                </svg>
                Created at {{ $object->created_at->toFormattedDateString() }}
            </div>
        </div>
    </div>
    <div class="mt-5 flex lg:mt-0 lg:ml-4">
        @if(auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'update'))
            <span class="hidden sm:block">
              <a href="{{ route($objects.".edit", $object->id) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-0">
                <!-- Heroicon name: solid/pencil -->
                <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                </svg>
                Edit
              </a>
            </span>
        @endif

        @if($userPlanning)
            <span class="hidden sm:block ml-3">
              <a href="{{ route("planning.show", ["user=".$object->id]) }}" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                {{__('View Planning')}}
              </a>
            </span>
        @endif


        @if(auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'delete'))
            <span class="sm:ml-3">
                @if($object->trashed())
                    <form action="{{ route($objects.".restore", $object->id) }}" method="GET">
                         <button type="submit" title="Restore" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-0">
                            <!-- Heroicon name: solid/check -->
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            {{__('Restore')}}
                        </button>
                    </form>
                @else
                    <form action="{{route($objects.".destroy", $object->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                         <button title="Delete" type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-0">
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"fill="currentColor" aria-hidden="true" viewBox="0 0 24 24" stroke="currentColor">
                                  <path fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" clip-rule="evenodd" />
                                </svg>
                             Delete
                        </button>
                    </form>
                @endif
            </span>
    @endif

    <!-- Dropdown -->
        <span x-cloak x-data="{showDropdown: false}" class="ml-3 relative sm:hidden">
          <button @click="showDropdown = !showDropdown" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-primary-color" id="mobile-menu-button" aria-expanded="false" aria-haspopup="true">
            More
            <svg class="-mr-1 ml-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </button>

          <div x-show="showDropdown" class="origin-top-right absolute right-0 mt-2 -mr-1 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none transition ease-out duration-200" role="menu" aria-orientation="vertical" aria-labelledby="mobile-menu-button" tabindex="-1" x-transition>
            <!-- Active: "bg-gray-100", Not Active: "" -->
            <a href="{{ route($objects.".edit", $object->id) }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="mobile-menu-item-0">Edit</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="mobile-menu-item-1">View</a>
          </div>
        </span>
    </div>
</div>