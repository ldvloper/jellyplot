<x-app-layout>
    <x-slot name="header">
        <x-header.breadcrumbs.show
            :title="$resource->name"
            resources="resources"
            :id="$resource->id"
            :management="false"
            :scheduler="false"
        >
        </x-header.breadcrumbs.show>
        <x-header.models.show
            :object="$resource"
            :title="$resource->name"
            :department="$resource->department->name_show"
            :price="$resource->expenses_converted"
            :task="true"
            objects="resources">
        </x-header.models.show>
    </x-slot>
    <div class="py-12 pb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6 bg-primary-color">
                            <h3 class="mt-1 text-xl leading-6 font-semibold text-white">
                                {{$resource->name}}
                            </h3>
                            <span class="text-secondary-color text-xs">ID: {{$resource->id}}</span>
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Resource Name')}}
                                    </dt>
                                    <dd class="flex items-center mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                                        <span style="background-color:{{$resource->color}}" class="border-2 border-gray-200 group-hover:bg-white mr-3 rounded-xl w-3 h-10"></span>
                                        {{$resource->name}}
                                    </dd>
                                </div>

                                <div class="bg-white-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Position')}}
                                    </dt>
                                    <dd class="flex mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{$resource->order_planning_ordinal}}
                                    </dd>
                                </div>

                                <div class="bg-white-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Price Hour')}}
                                    </dt>
                                    <dd class="flex mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{$resource->price_hour_euros}}
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500 capitalize">
                                        {{__('last edited')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{$resource->updated_at->diffForHumans()}}
                                    </dd>
                                </div>

                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500 capitalize">
                                        {{__('Last edited by')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if($resource->editor)
                                            <a class="hover:text-primary-color"
                                               href="{{route('users.show', $resource->editor->id)}}"
                                               title="{{__('Display user profile')}}">
                                                {{$resource->editor->name}}
                                            </a>
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
