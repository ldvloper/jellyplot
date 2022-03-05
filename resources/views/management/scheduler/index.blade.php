<x-app-layout>
    <x-slot name="header">
        <x-header.breadcrumbs.index resources="scheduler" :management="true" :scheduler="false"></x-header.breadcrumbs.index>
    </x-slot>
    <section class="p-10 ">
    <div class="h-96 grid grid-cols-2 gap-8 content-center">
        <a href="{{route('holidays.index')}}" class="p-10 rounded-xl border-2 border-white bg-primary-color hover:bg-secondary-color cursor-pointer">
            <div class="flex items-center text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                </svg>
                <h1 class="pl-5 font-light text-4xl">{{__('Holidays')}}</h1>
            </div>
            <div class="py-5 text-xl">
                <p class="text-white">
                    {{__('Manage Scheduler holidays')}}
                </p>
            </div>
        </a>
        <a class="p-10 rounded-xl border-2 border-white bg-secondary-color cursor-not-allowed">
            <div class="flex items-center text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
                </svg>
                <h1 class="pl-5 font-light text-4xl">{{__('Intensive Days')}}</h1>
            </div>
            <div class="py-5 text-xl">
                <p class="text-white">
                    {{__('Manage Scheduler Intensive days')}}
                </p>
            </div>
        </a>
    </div>
    </section>
</x-app-layout>
