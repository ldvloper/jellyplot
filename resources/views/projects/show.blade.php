<x-app-layout>
    <x-slot name="header">
        <x-header.breadcrumbs.show
            :title="$project->reference"
            resources="projects"
            :id="$project->id"
            :management="false"
            :scheduler="false"
        >
        </x-header.breadcrumbs.show>
        <x-header.models.show
            :object="$project"
            :title="$project->reference"
            :department="$project->customer->department->name_show"
            :price="$project->total_price"
            :task="true"
            objects="projects">
        </x-header.models.show>
    </x-slot>
    <div class="py-12 pb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    <div class="shadow overflow-hidden sm:rounded-lg">
                        <div class="bg-primary-color px-4 py-5 sm:px-6">
                            <p class="mt-1 max-w-2xl text-md text-white">
                                {{__('Project Information')}}
                            </p>
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="border-b px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Customer')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 font-bold sm:mt-0 sm:col-span-2">
                                        <a href="{{route('customers.show', $project->customer)}}" class="hover:text-primary-color"
                                           title="{{__('Go to')}} {{$project->customer->name}} {{__('related projects')}}">
                                            {{$project->customer->name}}
                                        </a>
                                    </dd>
                                </div>
                                <div class="border-b px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Reference')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 capitalize">
                                        {{$project->reference}}
                                    </dd>
                                </div>
                                <div class="border-b px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Project Manager')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{$project->projectManager->name}}
                                    </dd>
                                </div>
                                <div class="border-b px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Price')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{$project->total_price}}
                                    </dd>
                                </div>
                                <div class="border-b px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Billing Status')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                           @if($project->billing_status === 1)
                                               <x-status.billing.po-status/>
                                            @elseif($project->billing_status === 0)
                                                <x-status.billing.wpo-status/>
                                            @else
                                                <x-status.billing.npr-status/>
                                            @endif
                                    </dd>
                                </div>
                                <div class="border-b px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Deadline')}}
                                    </dt>
                                    <dd>
                                        <p x-data="{show: false}" class="grid justify-items-stretch mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                             <span x-show="!show">
                                                 {{$project->deadline->diffForHumans()}}
                                             </span>
                                            <span x-show="show">
                                                    {{__('Full Date')}}: <span class="font-semibold">{{$project->deadline}}</span>
                                            </span>

                                            <a x-on:click="show = !show" class="justify-self-end cursor-pointer hover:text-primary-color" title="{{__('Show full dateline')}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>

                                            </a>
                                        </p>
                                    </dd>
                                   </div>
                                   <div class="border-b px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                       <dt class="text-sm font-medium text-gray-500">
                                           {{__('Sample Reception')}}
                                        </dt>
                                            <dd class="flex mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                @if($project->sample_reception)
                                                    {{$project->sample_reception}}
                                                @else
                                                    <span class="text-red-700 font-bold">{{__('Sample not received')}}</span>
                                                @endif
                                            </dd>
                                    </div>
                                    <div class="border-b px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            {{__('Notes')}}
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 capitalize">
                                            {{$project->notes}}
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


