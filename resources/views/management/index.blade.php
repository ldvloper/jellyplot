<x-app-layout>
    <x-slot name="header">
        <x-header.breadcrumbs.index resources="management" :management="false" :scheduler="false"></x-header.breadcrumbs.index>
    </x-slot>
    <div class="py-12 pb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 overflow-hidden sm:rounded-lg">
                <div class="py-20 grid grid-cols-1 lg:grid-cols-2 gap-8 content-center">
                    <a href="{{route('users.index')}}" class="p-10 rounded-xl border-2 border-white bg-primary-color hover:bg-secondary-color cursor-pointer">
                        <div class="flex items-center text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <h1 class="pl-5 font-light text-4xl">{{__('Users')}}</h1>
                        </div>
                        <div class="py-5 text-xl">
                            <p class="text-white">
                                {{__('Manage ')}} {{ config('app.name','Jellyplot') }} {{(' Users')}}
                            </p>
                        </div>
                    </a>
                    <a href="{{route('positions.index')}}" class="p-10 rounded-xl border-2 border-white bg-primary-color hover:bg-secondary-color cursor-pointer">
                        <div class="flex items-center text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                            </svg>
                            <h1 class="pl-5 font-light text-4xl">{{__('Positions')}}</h1>
                        </div>
                        <div class="py-5 text-xl">
                            <p class="text-white">
                                {{__('Manage ')}} {{ config('app.name','Jellyplot') }}  {{__(' Positions')}}
                            </p>
                        </div>
                    </a>

                    <a href="{{route('scheduler.index')}}" class="p-10 rounded-xl border-2 border-white bg-primary-color hover:bg-secondary-color cursor-pointer">
                        <div class="flex items-center text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                            </svg>
                            <h1 class="pl-5 font-light text-4xl">{{__('Scheduler')}}</h1>
                        </div>
                        <div class="py-5 text-xl">
                            <p class="text-white">
                                {{__('Scheduler Settings')}}
                            </p>
                        </div>
                    </a>

                    <a href="{{route('shifts.index')}}" class="p-10 rounded-xl border-2 border-white bg-primary-color hover:bg-secondary-color cursor-pointer">
                        <div class="flex items-center text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <h1 class="pl-5 font-light text-4xl">{{__('Shifts')}}</h1>
                        </div>
                        <div class="py-5 text-xl">
                            <p class="text-white">
                                {{__('Manage Scheduler Shifts')}}
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

