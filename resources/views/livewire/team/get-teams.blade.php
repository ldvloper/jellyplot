<div class="h-full shadow-md rounded-md bg-white dark:bg-gray-700 ">
    <div class="font-bold text-white text-xl p-5 bg-primary-color rounded-t-lg">
        <h1>
            Jellyplot {{__('Teams')}}
            <br>
            <span class="text-sm">
               Total:
                <span class="text-gray-100 ml-2">

                </span>
           </span>
        </h1>
    </div>
    <div class="h-max-24 h-24 grid grid-cols-2 text-black text-xl p-3 bg-gray-100">
        <div class="px-4">
            <label for="name" class="text-sm">
                {{__('Search')}}:
            </label>
            <input name="name" id="name" wire:model="search" type="text"
                   class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700"
                   maxlength="20" placeholder="Name">
        </div>
        <div class="px-4">
            <label for="department" class="text-sm">
                {{__('Department')}}:
            </label>
            <select name="department" id="department" wire:model="department" class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700">
                <x-app.forms.teams.department-selection/>
            </select>
        </div>
    </div>
    <div class="h-80 border-t overflow-auto no-scrollbar scrolling-touch">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-gray-200">
                        @if($teams->isNotEmpty())
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-secondary-color text-white">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                        Department
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                        Owner
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teams as $team)
                                    <tr x-data="{ form: false }" x-cloak class="border-2 border-gray-100 dark:border-gray-800 text-center">
                                        <td class="py-2">
                                            {{$team->department->name_show}}
                                        </td>
                                        <td class="py-2">
                                            {{$team->name}}
                                        </td>
                                        <td class="text-sm py-2">
                                            <p>{{$team->owner->name}}</p>
                                            <p>{{$team->owner->email}}</p>
                                        </td>
                                        <td class="px-5 text-left">
                                            @if($requests->firstWhere('team_id', $team->id))
                                                <p class="text-gray-400 text-xs">
                                                    {{__('Team Request sent')}}
                                                </p>
                                            @else
                                                <button wire:click="sendRequest({{auth()->user()->id}},{{$team->id}})" class="px-2 py-1 flex items-center justify-center bg-primary-color rounded-md text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                    </svg>
                                                    {{__('Join')}}
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="h-96 grid grid-cols-1 gap-1 justify-items-center content-center font-semibold text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                                </svg>
                                <p class="text-justify">
                                    No Teams Found
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

