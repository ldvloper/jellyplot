<x-app-layout>
    <x-slot name="header">
        <x-header.breadcrumbs.edit
            :title="$shift->name"
            resources="shifts"
            :id="$shift->id"
            :management="true"
            :scheduler="false"
        >
        </x-header.breadcrumbs.edit>
        <x-header.management.edit
            :object="$shift"
            :title="$shift->name"
            :user-planning="false"
            objects="shifts">
        </x-header.management.edit>
    </x-slot>

    <div class="py-12 pb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    @livewire('management.shifts.edit-shift', ['shift' => $shift])
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
