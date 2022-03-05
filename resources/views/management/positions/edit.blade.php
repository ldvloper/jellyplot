<x-app-layout>
    <x-slot name="header">
        <x-header.breadcrumbs.edit
            :title="$position->name"
            resources="positions"
            :id="$position->id"
            :management="true"
            :scheduler="false"
        >
        </x-header.breadcrumbs.edit>
        <x-header.management.edit
            :object="$position"
            :title="$position->name"
            :user-planning="false"
            objects="positions">
        </x-header.management.edit>
    </x-slot>

    <div class="py-12 pb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    @livewire('management.positions.edit-position', ['position' => $position])
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
