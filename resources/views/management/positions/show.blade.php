<x-app-layout>
    <x-slot name="header">
        <x-header.breadcrumbs.show
            :title="$position->name"
            resources="positions"
            :id="$position->id"
            :management="true"
            :scheduler="false"
        >
        </x-header.breadcrumbs.show>
        <x-header.management.show
            :object="$position"
            :title="$position->name"
            :user-planning="false"
            objects="positions">
        </x-header.management.show>
    </x-slot>
    <div class="py-12 pb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6 bg-primary-color">
                            <h3 class="text-xl leading-6 font-semibold text-white">
                                {{$position->name}}
                            </h3>
                            <p class="mt-1 max-w-2xl text-md text-white">
                                {{__('Position Information')}}
                            </p>
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Identifier')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 font-black">
                                        {{$position->identifier}}
                                    </dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Name')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{$position->name}}
                                    </dd>
                                </div>

                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Department/s')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @foreach($position->departments as $department)
                                            <span class="mx-2 font-black px-2 rounded-md text-white bg-primary-color
                                                    group-hover:text-primary-color group-hover:bg-white">
                                            {{$department->name_show}}
                                        </span>
                                        @endforeach
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Comment')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if($position->comment)
                                            {{$position->comment}}
                                        @else
                                            -
                                        @endif
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
