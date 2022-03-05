<x-app-layout>
    <x-slot name="header">
        <x-header.breadcrumbs.edit
            :title="$user->name"
            resources="users"
            :id="$user->id"
            :management="true"
            :scheduler="false"
        ></x-header.breadcrumbs.edit>
        <!--Management Edit
            Object(Object): The main Object
            Title(string): Title
            Planning(bool): User planning
            Objects(string): The objects working on
        -->
        <x-header.management.edit
            :object="$user"
            :title="$user->name"
            :user-planning="true"
            objects="users">
        </x-header.management.edit>
    </x-slot>

    <div class="py-12 pb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font">
                        @livewire('management.users.edit-user', ['user' => $user])
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
