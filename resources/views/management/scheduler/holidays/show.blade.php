<x-app-layout>
    <x-slot name="header">
        <x-header.breadcrumbs.show
            :title="$holiday->name"
            resources="holidays"
            :id="$holiday->id"
            :management="true"
            :scheduler="true"
        >
        </x-header.breadcrumbs.show>
        <x-header.management.show
            :object="$holiday"
            :title="$holiday->name"
            :user-planning="false"
            objects="holidays">
        </x-header.management.show>
    </x-slot>
    <div class="py-12 pb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6 bg-primary-color">
                            <h3 class="text-xl leading-6 font-semibold text-white">
                                {{$holiday->name}}
                            </h3>
                            <p class="mt-1 max-w-2xl text-md text-white">
                                {{__('Holiday Information')}}
                            </p>
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Name')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 font-black">
                                        {{$holiday->name}}
                                    </dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Date')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{$holiday->date->toFormattedDateString()}}
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Annually')}}
                                    </dt>
                                    <dd class="flex items-center mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
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
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
