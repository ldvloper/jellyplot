<x-app-layout>
    <x-slot name="header">
        <x-header.breadcrumbs.edit
            :title="$holiday->name"
            resources="holidays"
            :id="$holiday->id"
            :management="true"
            :scheduler="true"
        ></x-header.breadcrumbs.edit>
        <!--Management Edit
            Object(Object): The main Object
            Title(string): Title
            Planning(bool): User planning
            Objects(string): The objects working on
        -->
        <x-header.management.edit
            :object="$holiday"
            :title="$holiday->name"
            :user-planning="false"
            objects="holidays">
        </x-header.management.edit>
    </x-slot>

    <div class="py-12 pb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    @livewire('management.scheduler.holidays.edit-holiday', ['holiday' => $holiday])
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
