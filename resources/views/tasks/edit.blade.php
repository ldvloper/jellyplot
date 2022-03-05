<x-app-layout>
    <x-slot name="header">
        <x-header.breadcrumbs.edit
            :title="$task->title"
            resources="tasks"
            :id="$task->id"
            :management="false"
            :scheduler="false"
        >
        </x-header.breadcrumbs.edit>
        <x-header.models.edit
            :object="$task"
            :title="$task->title"
            :department="$task->department->name_show"
            :price="$task->price/100"
            :task="true"
            objects="tasks">
        </x-header.models.edit>
    </x-slot>
    <div class="py-12 pb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    @livewire('tasks.edit-task', ['task' => $task])
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
