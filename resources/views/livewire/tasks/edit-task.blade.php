<x-templates.resources.edit>
    <form wire:submit.prevent="save()">
        <div class="px-4 py-5 sm:px-6 bg-white dark:bg-secondary-color">
            <h3 class="mt-1 text-xl leading-6 font-semibold text-black dark:text-white uppercase">
                {{$task->title}}
            </h3>
            <span class="text-gray-500 text-xs">ID: {{$task->id}}</span>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{__('Title')}} <span class="text-red-700">*</span>
                        </label>
                    </dt>
                    <dd class="mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                        <input wire:model="title" type="text" name="title" id="title"
                               class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700 uppercase"
                               maxlength="20">
                        @error('title')
                        <span class="text-sm text-red-700 ml-2 error self-center font-medium">*{{ $message }}</span>
                        @enderror
                    </dd>
                </div>

                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        <label for="start" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{__('Start Date')}} <span class="text-red-700">*</span>
                        </label>
                    </dt>
                    <dd class="mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                        <input wire:model="start" type="date" name="start" id="start" class="w-full mt-1 focus:ring-primary-color focus:border-primary-color shadow-sm text-sm border-gray-300 rounded-md">
                        @error('start')
                        <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                        @enderror
                    </dd>
                </div>

                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        <label for="end" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{__('End Date')}} <span class="text-red-700">*</span>
                        </label>
                    </dt>
                    <dd class="mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                        <input wire:model="end" type="date" name="end" id="end" class="w-full mt-1 focus:ring-primary-color focus:border-primary-color shadow-sm text-sm border-gray-300 rounded-md">
                        @error('end')
                        <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                        @enderror
                    </dd>
                </div>

                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        <label for="shift" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{__('Shift')}} <span class="text-red-700">*</span>
                        </label>
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <livewire:forms.shifts
                            name="shift"
                            value="{{$task->shift->id}}"
                            placeholder="Choose a Shift"
                        />
                        @error('shift')
                        <span class="text-sm text-red-700 ml-2 error self-center font-medium">*{{ $message }}</span>
                        @enderror
                    </dd>
                </div>

                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{__('Notes')}}
                        </label>
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <div class="mt-1">
                                <textarea wire:model="notes" id="notes" name=notes" rows="3" class="shadow-sm dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color mt-1 block w-full sm:text-sm border border-gray-300 dark:border-gray-700 rounded-md"
                                          placeholder="Task Notes Here"></textarea>
                        </div>
                        <p class="mt-1 md:mt-2 ml-2 text-sm text-gray-500">
                            If its necessary write task notes and comments here.
                        </p>
                        @error('notes')
                        <span class="text-sm text-red-700 ml-2 error self-center font-medium">*{{ $message }}</span>
                        @enderror
                    </dd>
                </div>

                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        <label for="project" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{__('Project')}} <span class="text-red-700">*</span>
                        </label>
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <livewire:forms.projects
                            name="project"
                            value="{{$task->project->id}}"
                            placeholder="Choose a Project"
                            :searchable="true"
                        />
                        @error('project')
                        <span class="text-sm text-red-700 ml-2 error self-center font-medium">*{{ $message }}</span>
                        @enderror
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        <label for="resource" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{__('Resource')}} <span class="text-red-700">*</span>
                        </label>
                    </dt>

                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <livewire:forms.resources
                            name="resource"
                            value="{{$task->resource->id}}"
                            placeholder="Choose a Resource"
                            :searchable="true"
                        />
                        @error('resource')
                        <span class="text-sm text-red-700 ml-2 error self-center font-medium">*{{ $message }}</span>
                        @enderror
                    </dd>
                </div>

                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        <label for="equipment">{{__('Equipment')}}</label>
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <livewire:forms.equipment
                            name="equipment"
                            value="{{$this->task->equipment_id}}"
                            placeholder="Choose a Resource"
                            :searchable="true"
                        />
                        @error('equipment')
                        <span class="text-sm text-red-700 ml-2 error self-center font-medium">*{{ $message }}</span>
                        @enderror
                    </dd>
                </div>

                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        <label for="test-manager" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{__('Test Manager')}}
                        </label>
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <livewire:forms.test-managers
                            name="test-manager"
                            value="{{$this->task->test_manager_id}}"
                            placeholder="Choose a Test Manager"
                            :searchable="true"
                        />
                        @error('testManager')
                        <span class="text-sm text-red-700 ml-2 error self-center font-medium">*{{ $message }}</span>
                        @enderror
                    </dd>
                </div>

                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        <label for="reference" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{__('Technician')}}
                        </label>
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <livewire:forms.technician
                            name="technician"
                            value="{{$this->task->technician_id}}"
                            placeholder="Choose a Technician"
                            :searchable="true"
                        />
                        @error('technician')
                        <span class="text-sm text-red-700 ml-2 error self-center font-medium">*{{ $message }}</span>
                        @enderror
                    </dd>
                </div>

            </dl>
        </div>
        <div class="flex items-center justify-end px-4 py-3 bg-white dark:bg-secondary-color text-right sm:px-6">

            @if (session()->has('errorUpdating'))
                <span class="text-sm font-light text-red-700 pr-5">
                       {{ session('errorUpdating') }}
                </span>
            @endif

            <button type="submit" class="inline-flex items-center justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-700 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-color">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                </svg>
                <span class="pl-2">{{__('Save')}}</span>
            </button>
        </div>
    </form>
</x-templates.resources.edit>
