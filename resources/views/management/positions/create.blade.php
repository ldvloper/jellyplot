<x-app-layout>
    <x-slot name="header">
        <x-header.breadcrumbs.create resources="positions" :management="true" :scheduler="false"></x-header.breadcrumbs.create>
    </x-slot>
    <div class="py-12 pb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg py-10 px-5">
                <section class="text-gray-600 body-font">
                    <livewire:management.positions.create-position/>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
