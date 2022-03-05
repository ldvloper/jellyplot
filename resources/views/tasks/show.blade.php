<x-vue-layout>
    <x-slot name="header">
        <x-header.breadcrumbs.show
            :title="$task->title"
            resources="tasks"
            :id="$task->id"
            :management="false"
            :scheduler="false"
        >
        </x-header.breadcrumbs.show>
        <x-header.models.show
            :object="$task"
            :title="$task->title"
            :department="$task->department->name_show"
            :price="$task->cost"
            :task="false"
            objects="tasks">
        </x-header.models.show>
    </x-slot>

    <div class="py-12 pb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="bg-primary-color px-4 py-5 sm:px-6">
                            <h3 class="mt-1 text-xl leading-6 font-semibold text-white">
                                {{__('General Data')}}
                            </h3>
                            <span class="text-secondary-color text-xs">ID: {{$task->id}}</span>
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Task Title')}}
                                    </dt>
                                    <dd class="flex items-center mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2 capitalize">
                                        {{$task->title}}
                                    </dd>
                                </div>

                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Dates')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <div class="grid grid-cols-2 gap-8">
                                            <div>
                                                <p class="py-2">Start: <span class="font-bold">{{$task->start}}</span></p>
                                                <p class="py-2">End:  <span class="font-bold">{{$task->end}}</span></p>
                                            </div>
                                            <a href="" class="place-self-center text-primary-color">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Shift')}}
                                    </dt>
                                    <dd class="flex items-center mt-1 text-sm font-bold text-gray-900 sm:mt-0
                                    sm:col-span-2 capitalize">
                                        {{$task->shift->name}}
                                        <span class="px-4 font-light">
                                            ({{$task->shift->from}}:00h - {{$task->shift->to}}:00h)
                                        </span>
                                    </dd>
                                </div>

                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500 capitalize">
                                        {{__('Last edited by')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if($task->editor)
                                            <a class="hover:text-primary-color"
                                               href="{{route('users.show', $task->creator->id)}}"
                                               title="{{__('Display user profile')}}">
                                                {{$task->creator->name}}
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500 capitalize">
                                        {{__('last edited')}}
                                    </dt>
                                    <dd x-cloak x-data="{show:false}" class="flex items-center mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <div>
                                            <span x-show="!show">
                                                {{$task->updated_at->diffForHumans()}}
                                            </span>
                                            <span x-show="show">
                                                {{$task->updated_at}}
                                            </span>
                                        </div>

                                        <span class="ml-6">
                                            <a x-on:click="show = !show" class="cursor-pointer">
                                                <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                                </svg>
                                            </a>
                                        </span>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </section>

                <!--Relationships-->
                <div class="px-2 py-5 grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <x-tasks.project :project="$task->project"></x-tasks.project>
                    <x-tasks.resource :resource="$task->resource"></x-tasks.resource>
                    @if($task->testManager)
                        <x-tasks.user title="Test Manager" :user="$task->testManager"></x-tasks.user>
                    @else
                        <x-tasks.user title="Test Manager" :user="null"></x-tasks.user>
                    @endif
                    @if($task->technician)
                        <x-tasks.user title="Technician" :user="$task->technician"></x-tasks.user>
                    @else
                        <x-tasks.user title="Technician" :user="null"></x-tasks.user>
                    @endif

                </div>
                <!--Statistics-->
                <div id="app" class="px-2 rounded-md">
                    <tasks-statistics-costs class="rounded-md" :task="{{ json_encode($task)}}"></tasks-statistics-costs>
                </div>

                <div class="shadow-2xl mt-4 p-2 bg-gray-200 rounded-lg">
                    <!-- Load Comments -->
                    <livewire:tasks.comments.get-comments :task="$task">
                    </livewire:tasks.comments.get-comments>
                    <!--NEW Comment-->
                    <div class="border-dotted border-t-2 border-gray-400">
                        <livewire:tasks.comments.create-comment :task="$task" :user="auth()->user()">
                        </livewire:tasks.comments.create-comment>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-vue-layout>
