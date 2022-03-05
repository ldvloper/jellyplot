<x-app-layout>
    <x-slot name="header">
        <x-header.breadcrumbs.edit
            :title="$customer->name"
            :management="false"
            :scheduler="false"
            resources="customers"
            :id="$customer->id"
        >
        </x-header.breadcrumbs.edit>
        <x-header.models.edit
            :object="$customer"
            :title="$customer->name"
            :department="$customer->department->name_show"
            :price="$customer->name"
            :task="false"
            objects="customers">
        </x-header.models.edit>
    </x-slot>
    <div class="py-12 pb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    @livewire('customers.edit-customer', ['customer' => $customer])
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
