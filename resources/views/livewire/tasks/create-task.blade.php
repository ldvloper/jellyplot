<form wire:submit.prevent="save">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Basic Information</h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-200">
                    {{__('This is the basic task information that will be displayed in the scheduler.')}}
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{__('Title')}} <span class="text-red-700">*</span>
                        </label>
                        <input wire:model="title" type="text" name="title" id="title"
                               class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700 capitalize"
                               placeholder="{{__('Title')}}">
                        @error('title')
                        <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4 mt-3">
                        <div>
                            <label for="startDate" class="block text-sm font-medium text-gray-700">
                                Start Date <span class="text-red-700">*</span>
                            </label>
                            <input wire:model="start" type="date" name="startDate" id="startDate" class="w-full mt-1 focus:ring-primary-color focus:border-primary-color shadow-sm text-sm border-gray-300 rounded-md">
                            @error('start')
                            <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="endDate" class="block text-sm font-medium text-gray-700">
                                End Date <span class="text-red-700">*</span>
                            </label>
                            <input wire:model="end" type="date" name="endDate" id="endDate" class="w-full mt-1 focus:ring-primary-color focus:border-primary-color shadow-sm text-sm border-gray-300 rounded-md">
                            @error('end')
                            <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <label for="shift" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                {{__('Shift Schedule')}} <span class="text-red-700">*</span>
                            </label>
                            <livewire:forms.shifts
                                name="shift"
                                placeholder="Choose Shift"
                            />
                            @error('shift')
                            <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{__('Notes')}}
                        </label>
                        <div class="mt-1">
                                <textarea wire:model="notes" id="notes" name=notes" rows="3" class="shadow-sm dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color mt-1 block w-full sm:text-sm border border-gray-300 dark:border-gray-700 rounded-md"
                                          placeholder="Project Notes Here"></textarea>
                            @error('notes')
                            <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                            @enderror
                        </div>
                        <p class="mt-1 md:mt-2 ml-2 text-sm text-gray-500">
                            {{__('If its necessary write tasks notes and comments.')}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>

    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{__('Related Information')}}</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        {{__('The information to manage the tasks and place them into the scheduler.')}}.
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="mt-3">
                            <label for="resource" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                {{__('Resource')}} <span class="text-red-700">*</span>
                            </label>
                            <livewire:forms.resources
                                name="resource"
                                placeholder="Choose a Resource"
                                :searchable="true"
                            />
                            @error('resource')
                            <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                            @enderror

                            <div>
                                <div class="flex justify-end">
                                    <a href="{{route('resources.create')}}" class="pt-2 text-sm flex justify-center items-center dark:text-white hover:text-primary-color cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class=" h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        <span class="justify-center">{{__('New Resource')}}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="reference" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                {{__('Project')}} <span class="text-red-700">*</span>
                            </label>
                            <div class="mt-1 mb-2">
                                <livewire:forms.projects
                                    name="project"
                                    placeholder="Choose a Project"
                                    :searchable="true"
                                />
                                @error('project')
                                <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                                @enderror
                                <div>
                                    <div class="flex justify-end">
                                        <a href="{{route('projects.create')}}" class="pt-2 text-sm flex justify-center items-center dark:text-white hover:text-primary-color cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                            <span class="justify-center">{{__('New Project')}}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="equipment" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                {{__('Equipment')}}
                            </label>
                            <div class="mt-1 mb-2">
                                <livewire:forms.equipment
                                    name="equipment"
                                    placeholder="Choose a Equipment"
                                    :searchable="true"
                                />
                                @error('equipment')
                                <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                                @enderror
                                <div>
                                    <div class="flex justify-end">
                                        <a href="{{route('equipment.create')}}" class="pt-2 text-sm flex justify-center items-center dark:text-white hover:text-primary-color cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                            <span class="justify-center">{{__('New Equipment')}}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="reference" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                {{__('Test Manager')}} <span class="text-red-700">*</span>
                            </label>
                            <div class="mt-1 mb-2">
                                <livewire:forms.test-managers
                                    name="test-managers"
                                    placeholder="Choose a Test Manager"
                                    :searchable="true"
                                />
                                @error('testManager')
                                <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="reference" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                {{__('Technician')}} <span class="text-red-700">*</span>
                            </label>
                            <div class="mt-1 mb-2">
                                <livewire:forms.technician
                                    name="technician"
                                    placeholder="Choose a Technician"
                                    :searchable="true"
                                />
                                @error('technician')
                                    <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-700 hover:bg-primary-color focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-color">
                            {{__('Create Task')}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@livewire('modals.customer-create')
