<x-app-layout>
    <x-slot name="header">
        <x-header.breadcrumbs.show
            :title="$shift->name"
            resources="shifts"
            :id="$shift->id"
            :management="true"
            :scheduler="false"
        >
        </x-header.breadcrumbs.show>
        <x-header.management.show
            :object="$shift"
            :title="$shift->name"
            :user-planning="false"
            objects="shifts">
        </x-header.management.show>
    </x-slot>
    <div class="py-12 pb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6 bg-primary-color">
                            <h3 class="text-xl leading-6 font-semibold text-white capitalize">
                                {{$shift->name}}
                            </h3>
                            <p class="mt-1 max-w-2xl text-md text-white">
                                {{__('Shift Information')}}
                            </p>
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Name')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 font-black capitalize">
                                        {{$shift->name}}
                                    </dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('From')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{$shift->from}}:00h
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('To')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                       {{$shift->to}}:00h
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Total Hours')}}
                                    </dt>
                                    <dd class="font-black mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{$shift->total_hours}} hours
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
