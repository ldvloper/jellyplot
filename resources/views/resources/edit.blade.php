<x-app-layout>
    <x-slot name="header">
        <x-header.breadcrumbs.edit
            :title="$resource->name"
            resources="resources"
            :id="$resource->id"
            :management="false"
            :scheduler="false"
        >
        </x-header.breadcrumbs.edit>
        <x-header.models.edit
            :object="$resource"
            :title="$resource->name"
            :department="$resource->department->name_show"
            :price="$resource->expenses_converted"
            :task="false"
            objects="resources">
        </x-header.models.edit>
    </x-slot>
    <div class="py-12 pb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    @livewire('resources.edit-resource', ['resource' => $resource])
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
