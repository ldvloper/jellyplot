<x-app-layout>
    <x-slot name="header">
        <x-header.breadcrumbs.edit
            :title="$project->reference"
            resources="projects"
            :id="$project->id"
            :management="false"
            :scheduler="false"
        >
        </x-header.breadcrumbs.edit>
        <x-header.models.edit
            :object="$project"
            :title="$project->reference"
            :department="$project->customer->department->name_show"
            :price="$project->total_price"
            :task="false"
            objects="projects">
        </x-header.models.edit>
    </x-slot>
<div class="py-12 pb-20">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-200 dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg">
            <section class="text-gray-600 body-font">
                @livewire('projects.edit-project', ['project' => $project])
            </section>
        </div>
    </div>
</div>
</x-app-layout>
