<div>
    <div class="text-2xl bg-secondary-color p-2 rounded-t-md">
        @if(auth()->user()->currentTeam->department)
            {{auth()->user()->currentTeam->department->name_show}}
        @else
            {{__('General')}}
        @endif
        Statistics
    </div>
    <div class="bg-white px-5 py-12 rounded-b-md grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 ">
        <a href="{{route('customers.index')}}" class="flex justify-items-start items-center transform-gpu hover:scale-105 transition duration-300 ease-out hover:ease-in">
            <div class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="bg-primary-color inline-block p-5 h-14 w-14 rounded-full ring-2 ring-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <div class="ml-3 text-black">
                <h1 class=" text-lg font-bold">{{$customers->count()}}</h1>
                <span>{{__('Customers')}}</span>
            </div>
        </a>
        <a href="{{route('projects.index')}}" class="flex justify-items-start transform-gpu hover:scale-105 transition duration-300 ease-out hover:ease-in">
            <div class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="bg-primary-color inline-block p-5 h-14 w-14 rounded-full ring-2 ring-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
            </div>
            <div class="ml-3 text-black">
                <h1 class="text-lg font-bold">{{$projects->count()}}</h1>
                <span>{{__('Projects')}}</span>
            </div>
        </a>
        <a href="{{route('resources.index')}}" class="flex justify-items-start transform-gpu hover:scale-105 transition duration-300 ease-out hover:ease-in">
            <div class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="bg-primary-color inline-block p-5 h-14 w-14 rounded-full ring-2 ring-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
            </div>
            <div class="ml-3 text-black">
                <h1 class="text-lg font-bold">{{$resources->count()}}</h1>
                <span>{{__('Resources')}}</span>
            </div>
        </a>
        <a href="{{route('equipment.index')}}" class="flex justify-items-start transform-gpu hover:scale-105 transition duration-300 ease-out hover:ease-in">
            <div class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="bg-primary-color inline-block p-5 h-14 w-14 rounded-full ring-2 ring-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                </svg>
            </div>
            <div class="ml-3 text-black">
                <h1 class="text-lg font-bold">{{$equipment->count()}}</h1>
                <span>{{__('Equipment')}}</span>
            </div>
        </a>
    </div>
</div>
