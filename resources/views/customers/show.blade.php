<x-app-layout>
    <x-slot name="header">
        <x-header.breadcrumbs.show
            :title="$customer->name"
            resources="customers"
            :id="$customer->id"
            :management="false"
            :scheduler="false"
        >
        </x-header.breadcrumbs.show>
        <x-header.models.show
            :object="$customer"
            :title="$customer->name"
            :department="$customer->department->name_show"
            :price="$customer->total_expenses"
            :task="true"
            objects="customers">
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
                                {{$customer->name}}
                            </h3>
                            <span class="text-secondary-color text-xs">ID: {{$customer->id}}</span>
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Customer Name')}}
                                    </dt>
                                    <dd class="mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{$customer->name}}
                                    </dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Department')}}
                                    </dt>
                                    <dd class="mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{$customer->department->name_show}}
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500 capitalize">
                                        {{__('last edited')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{$customer->updated_at->diffForHumans()}}
                                    </dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500 capitalize">
                                        {{__('created at')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{$customer->created_at}}
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500 capitalize">
                                        {{__('created by')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <a class="hover:text-primary-color"
                                           href="{{route('users.show', $customer->creator->id)}}"
                                            title="{{__('Display user profile')}}">
                                            {{$customer->creator->name}}
                                        </a>
                                    </dd>
                                </div>

                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500 capitalize">
                                            {{__('Last edited by')}}
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            @if($customer->editor)
                                                {{$customer->editor->name}}
                                            @else
                                                -
                                            @endif
                                        </dd>
                                    </div>
                                @if($customer->site)
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                           Related Site
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                    <div class="w-0 flex-1 flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                                        </svg>
                                                        <span class="ml-2 flex-1 w-0 truncate">
                                                          {{$customer->site}}
                                                        </span>
                                                    </div>
                                                    <div class="ml-4 flex-shrink-0">
                                                        <a href="{{$customer->site}}" class="font-medium text-primary-color hover:text-secondary-color">
                                                           View
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </dd>
                                    </div>
                                @endif
                            </dl>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="py-12 pb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-xl py-2">
                <span class="text-primary-color">{{$customer->name}}</span>
                - {{__('Related Projects')}}
            </h1>
            <div class="bg-gray-200 dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font">
                            @livewire('projects.helpers.get-projects-by-customer', ['customer' => $customer])
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
