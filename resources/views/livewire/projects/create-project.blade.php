<form wire:submit.prevent="save">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Basic Information</h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-200">
                    {{__('This is the basic project information it will displayed publicly for all user so be careful
                        what you share.')}}
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6">
                            <div>
                            <label for="customer" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                {{__('Customer')}} <span class="text-red-700">*</span>
                            </label>
                                <livewire:forms.customers
                                    name="customer"
                                    placeholder="Search a Customer"
                                    :searchable="true"
                                />
                                @error('customer')
                                <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                                @enderror

                            <div>
                                <div class="flex justify-end">
                                    <a wire:click="$emit('openModal')" class="pt-2 text-sm flex justify-center items-center dark:text-white hover:text-primary-color cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class=" h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        <span class="justify-center">{{__('New Customer')}}</span>
                                    </a>
                                </div>
                            </div>
                            </div>
                        <div>
                            <label for="reference" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                {{__('Project Reference')}} <span class="text-red-700">*</span>
                            </label>
                            <div class="mt-1 mb-2">
                                <input wire:model="reference" type="text" name="reference" id="reference"
                                       class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700"
                                       placeholder="{{__('Project Reference')}}" maxlength="15" >
                                @error('reference')
                                    <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label>
                                <label for="color" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                    {{__('Project Color Identifier')}} <span class="text-red-700">*</span>
                                </label>
                            </label>
                            <div class="mt-3 mb-4">
                                <input wire:model="color" type="color" name="color" id="color" class="w-full rounded-pill sm:text-sm " maxlength="20">
                                @error('color')
                                <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
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
                                If its necessary write project notes and comments.
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
                       {{__('The information to manage the project, users, date and costs information')}}.
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div x-cloak x-data="{ show: false }" class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="w-full">
                            <label for="projectManager" class="block text-sm font-medium text-gray-700">
                                {{__('Project Manager')}}  <span class="text-red-700">*</span>
                            </label>
                            <livewire:forms.project-managers
                                name="projectManager"
                                placeholder="Search a Project Manager"
                                :searchable="true"
                            />
                            @error('projectManager')
                            <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-2 grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <div>
                                    <label for="price" class="block text-sm font-medium text-gray-700">
                                        Price <span class="text-red-700">*</span>
                                    </label>
                                    <div class="mt-1 w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border border-gray-300 dark:border-gray-700">
                                        <div class="flex items-center">
                                            <input wire:model="price" type="text" name="price" id="price" class="w-full text-sm rounded-md pl-2 p-2 focus:ring-transparent focus:border-transparent border border-transparent" placeholder="0.00">
                                            <span class="text-gray-500 sm:text-sm pr-2">
                                                €
                                            </span>
                                        </div>

                                    </div>
                                    @error('price')
                                    <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="status" class="block text-sm font-medium text-gray-700">
                                    {{__('Billing Status')}} <span class="text-red-700">*</span>
                                </label>
                                <select wire:model="status" id="status" name="status" autocomplete="status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-color focus:border-primary-color sm:text-sm">
                                    <option selected>Please Select</option>
                                    <option value="0">Without PO</option>
                                    <option value="1">With PO</option>
                                    <option value="2">No productive</option>
                                </select>
                                @error('status')
                                <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="deadline" class="block text-sm font-medium text-gray-700">
                                    DeadLine <span class="text-red-700">*</span>
                                </label>
                                <input wire:model="deadlineDate" type="date" name="deadlineDate" id="deadlineDate" class="w-full mt-1 focus:ring-primary-color focus:border-primary-color shadow-sm text-sm border-gray-300 rounded-md">
                                @error('deadlineDate')
                                    <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-5 col-span-6">
                                <div class="text-sm">
                                    <label for="sample" class="block text-sm font-medium text-gray-700">
                                        Sample Reception <span class="text-red-700">*</span>
                                    </label>
                                    <label for="sample" class="w-10 mt-2 flex items-center cursor-pointer">
                                        <!-- label -->
                                        <!-- toggle -->
                                        <div class="relative">
                                            <!-- input -->
                                            <input  id="sample" name="sampleReception" type="checkbox" class="sr-only" wire:model="sampleReception" x-on:click="show = ! show"/>
                                            <!-- line -->
                                            <div class="w-10 h-4 bg-gray-200 rounded-full shadow-inner"></div>
                                            <!-- dot -->
                                            <div class="filter drop-shadow-md dot absolute w-6 h-6 bg-gray-400 rounded-full shadow -left-1 -top-1 transition"></div>
                                        </div>
                                        <!-- label -->
                                        <div x-cloak x-show="show" class="ml-3 mt-1 text-green-500 font-medium group cursor-pointer relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <div class="hidden md:block max-w-25 absolute z-10 opacity-0 group-hover:opacity-100 bg-green-500 text-white text-xs rounded py-1 px-2 right-0 top-full pointer-events-none">
                                                Received
                                            </div>
                                        </div>
                                        <div x-cloak x-show="!show" class="ml-3 mt-1 text-gray-400 font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                    </label>
                                    <p class="text-gray-500">{{__('Check this box if the sample have been received')}}.</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 grid grid-cols-6 gap-6"  x-show="show"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 transform scale-90"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-800"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-90">
                            <!--Colums to show-->
                            <div class="mt-2 mb-5 col-span-6 sm:col-span-3">
                                <div>
                                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                    <div class="group mt-1 flex relative rounded-md border border-gray-300 focus:ring-primary-color focus:border-primary-color shadow-sm">
                                        <div class="w-full relative pl-5 flex items-center pointer-events-none">
                                            @if($reference)
                                                <span class="text-gray-500 text-sm">{{$reference}}</span>
                                            @else
                                                <span class="text-gray-500 text-sm">{{__('Project Reference')}}</span>
                                            @endif
                                        </div>
                                        <div class="flex justify-center items-center">
                                            <span class="text-gray-200 mx-2 font-light">|</span>
                                        </div>
                                        <input type="text" name="price" id="price" class="focus:ring-transparent focus:border-transparent block w-full pr-20 pl-2 text-sm border-transparent rounded-md"
                                               placeholder="Sample Code" wire:model="sampleReceptionCode">
                                        <div class="absolute inset-y-0 right-0 flex items-center">
                                            <label for="currency" class="sr-only">Currency</label>
                                            <select id="currency" name="currency" class="focus:ring-primary-color focus:border-primary-color h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                                                <option value="1">Type 1</option>
                                                <option value="1">Type 2</option>
                                                <option value="1">Type 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                    @error('sampleReceptionCode')
                                    <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="mt-2 mb-5 col-span-6 sm:col-span-3">
                                <label for="sampleReceptionDate" class="block text-sm font-medium text-gray-700">
                                    Sample Reception Date <span class="text-red-700">*</span>
                                </label>
                                <input wire:model="sampleReceptionDate" type="date" name="sampleReceptionDate" id="sampleReceptionDate" class="w-full mt-1 focus:ring-primary-color focus:border-primary-color shadow-sm text-sm border-gray-300 rounded-md">
                                @error('sampleReceptionDate')
                                <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-700 hover:bg-primary-color focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-color">
                            {{__('Create Project')}}
                        </button>
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
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        {{__('Notifications')}} <span class="text-sm text-primary-color">Beta</span></h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Decide which communications you'd like to receive and how.
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">

                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <fieldset>
                            <legend class="text-base font-medium text-gray-900">{{__('Email Notifications')}}</legend>
                            <div class="mt-4 space-y-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="comments" name="comments" type="checkbox" class="focus:ring-primary-color h-4 w-4 text-primary-color border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="comments" class="font-medium text-gray-700">Sample Reception</label>
                                        <p class="text-gray-500">Managers get notified when the sample have been received.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="candidates" name="candidates" type="checkbox" class="focus:ring-primary-color h-4 w-4 text-primary-color border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="candidates" class="font-medium text-gray-700">PO Alarm</label>
                                        <p class="text-gray-500">Managers get notified when the PO have not been executed.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="offers" name="offers" type="checkbox" class="focus:ring-primary-color h-4 w-4 text-primary-color border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="offers" class="font-medium text-gray-700">Deadline</label>
                                        <p class="text-gray-500">Managers get notified before deadline is reached.</p>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <x-icons.power-automate></x-icons.power-automate>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@livewire('modals.customer-create')
