<x-app-layout>
    <x-slot name="header">
        <x-header.breadcrumbs.index resources="holidays" :management="true" :scheduler="true"></x-header.breadcrumbs.index>
    </x-slot>
    <div class="py-12 pb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    <livewire:management.scheduler.holidays.get-holidays></livewire:management.scheduler.holidays.get-holidays>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
