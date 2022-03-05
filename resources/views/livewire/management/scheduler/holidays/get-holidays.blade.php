<div class="flex flex-col">
    <div class="mb-1 p-5 w-full border border-primary-color rounded-xl">
        <h1 class="text-xl font-bold dark:text-gray-200">Filters:</h1>
        <div class="mt-2 grid gap-4 grid-cols-1 md:grid-cols-2">
            <div>
                <label for="search" class="text-sm">
                    {{__('Name')}}:
                </label>
                <input id="search" wire:model="search" type="search" placeholder="{{__('Name')}}" class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700">
            </div>
            <div>
                <div class="grid gap-1 grid-cols-2 md:grid-cols-3 mt-5 justify-items-end">
                    <div class="flex group justify-self-start">
                        <label for="sortBy" class="text-sm text-primary-color">
                            Order:
                        </label>
                        <select id="sortBy" wire:model="sortBy" class="cursor-pointer text-sm border-none bg-transparent text-black focus:text-black dark:text-gray-400 focus:text-gray-500 placeholder-white focus:ring-transparent focus:border-transparent">
                            <option disabled>Order</option>
                            <option value="asc">ASC</option>
                            <option value="desc">DESC</option>
                        </select>
                    </div>
                    <div class="flex group justify-self-start">
                        <label for="show-per-page" class="text-sm text-primary-color">
                            Display:
                        </label>
                        <select id="show-per-page" wire:model="perPage" class="cursor-pointer text-sm bg-transparent border-none text-black dark:text-gray-400 focus:text-black placeholder-white focus:ring-transparent focus:border-transparent sm:text-sm">
                            <option disabled>Per Page</option>
                            <option value="10">Show 10</option>
                            <option value="25">Show 25</option>
                            <option value="50">Show 50</option>
                            <option value="100">Show 100</option>
                        </select>
                    </div>


                    <div x-cloak x-data="{ show:false}" class="flex group col-span-2 md:col-span-1 justify-self-end">
                        <div class="text-sm">
                            <label for="sample" class="block text-sm font-medium text-gray-700">
                                Show Deleted
                            </label>
                            <label for="sample" class="w-10 mt-2 flex items-center cursor-pointer">
                                <!-- label -->
                                <!-- toggle -->
                                <div class="relative">
                                    <!-- input -->
                                    <input id="sample" name="sampleReception" type="checkbox" class="sr-only" wire:model="showTrashed"  x-on:click="show = ! show"/>
                                    <!-- line -->
                                    <div class="w-10 h-4 bg-gray-300 rounded-full shadow-inner"></div>
                                    <!-- dot -->
                                    <div class="filter drop-shadow-md red-dot absolute w-6 h-6 bg-gray-400 rounded-full shadow -left-1 -top-1 transition"></div>
                                </div>
                                <div x-show="show" class="ml-3 mt-1 text-red-600 font-medium group cursor-pointer relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    <div class="hidden md:block max-w-25 absolute z-10 opacity-0 group-hover:opacity-100 bg-red-600 text-white text-xs rounded py-1 px-2 right-0 top-full pointer-events-none">
                                        {{__('Showing deleted projects')}}
                                    </div>
                                </div>
                                <div x-show="!show" class="ml-3 mt-1 text-gray-400 font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:hidden mt-5">
            {{ $holidays->links('vendor.livewire.pagination.tailwind') }}
        </div>
    </div>
    <!--Table view-->
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 bg-primary-color sm:rounded-lg">
                <!--Filters-->
                <div class="flex mt-5 mb-2 mr-2">
                    <div class="flex flex-grow p-5 w-full lg:w-3/12 text-white">
                        <h1 class="text-sm">
                            {{__('Search')}}:
                            <span class="text-md font-semibold">
                                @if($holidays->total()===1)
                                    {{$holidays->total()}} {{__('Holiday Found')}}
                                @else
                                    {{$holidays->total()}} {{__('Holidays Found')}}
                                @endif
                            </span>
                        </h1>
                    </div>
                    @if(auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'create'))
                        <div class="pr-5 self-center order-last">
                            <a href="{{route('holidays.create')}}" class="flex justify-end text-sm p-3 text-white bg-green-700 hover:bg-green-600 rounded-md cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="self-center h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                <span class="hidden md:block"> {{__('New Holiday')}}</span>
                            </a>
                        </div>
                    @endif
                </div>
                <!--End Filters-->

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        @if($holidays->count())
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Annually
                            </th>
                        @else
                            <th class="p-5">{{__('No holidays found')}}</th>
                        @endif

                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                    @foreach($holidays as $holiday)
                        <tr class="group hover:bg-primary-color hover:text-white {{ $holiday->trashed() ? 'bg-gray-300' : '' }}">
                            <td class="flex items-center px-6 py-6 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{route('holidays.show', $holiday)}}" class="p-2 hover:bg-white hover:text-primary-color rounded-md cursor-pointer ease-in-out"
                                   title="Show: {{$holiday->name}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                @if(auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'update'))
                                    <a href="{{route('holidays.edit', $holiday)}}" class="p-2 hover:bg-white hover:text-primary-color rounded-md cursor-pointer ease-in-out"
                                       title="Edit: {{$holiday->name}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                @endif

                                @if(auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'delete') && !$holiday->trashed())
                                    <form action="{{route("holidays.destroy", $holiday->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex w-full justify-center p-2 hover:bg-white hover:text-primary-color rounded-md cursor-pointer ease-in-out" title="Delete: {{$holiday->name}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z" />
                                            </svg>
                                        </button>
                                    </form>
                                @elseif($holiday->trashed())
                                    <span class="ml-1 min-vh-100w-8 self-center font-semibold">Deleted {{$holiday->deleted_at->diffForHumans()}}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-light text-gray-900 group-hover:text-white">
                                            {{$holiday->name}}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 group-hover:text-white">
                                    <p class="font-black">{{$holiday->date->toFormattedDateString()}}</p>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center text-sm text-gray-900 group-hover:text-white">
                                    @if($holiday->annually)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-green-600 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <p class="pl-2">Yes</p>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-red-600 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <p class="pl-2">No</p>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="p-5 border-gray-200">
        {{ $holidays->links('vendor.livewire.pagination.tailwind') }}
    </div>
</div>
