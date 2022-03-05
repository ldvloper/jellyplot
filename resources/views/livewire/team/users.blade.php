
<div class="bg-white dark:bg-gray-800 rounded-lg">
    <div class="font-bold text-white text-xl p-5 bg-primary-color rounded-t-lg">
        <h1>
            {{__('Team')}}: {{auth()->user()->currentTeam->name}}
            <br>
            <span class="text-sm">Users</span>
        </h1>
    </div>
        <div class="max-h-screen overflow-y-auto container flex flex-col w-full shadow rounded-b-lg">
        <ul class="flex flex-col divide divide-y">
                @foreach($users as $user)
                    <li class="group flex flex-row">
                        <div class="select-none cursor-pointer flex flex-1 items-center p-4">
                            <div class="flex-1 pl-1 mr-16">
                                <div class="font-medium dark:text-white group-hover:text-primary-color">
                                    {{ $user->name}}
                                </div>
                                <div class="text-gray-600 dark:text-gray-200 text-sm group-hover:text-primary-color">
                                    {{$user->email}}
                                </div>
                            </div>
                            <div class="text-gray-600 dark:text-gray-200 text-xs group-hover:text-primary-color">
                                @if(!($user->department) && $user->master )
                                    Master Admin
                                @elseif($user->department)
                                    {{$user->department->name_show}}
                                @else
                                    None
                                @endif
                            </div>
                        </div>
                    </li>
                @endforeach
        </ul>
    </div>
</div>

