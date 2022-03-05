<x-app-layout>
    <x-slot name="header">
        <x-header.breadcrumbs.edit
            :title="$equipment->name"
            resources="equipment"
            :id="$equipment->id"
            :management="false"
            :scheduler="false"
        >
        </x-header.breadcrumbs.edit>
        <x-header.models.edit
            :object="$equipment"
            :title="$equipment->name"
            :department="$equipment->department->name_show"
            :price="200"
            :task="false"
            objects="equipment">
        </x-header.models.edit>
    </x-slot>
    <div class="py-12 pb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    @livewire('equipment.edit-equipment', ['equipment' => $equipment])
                </section>
            </div>
        </div>
    </div>
</x-app-layout>

