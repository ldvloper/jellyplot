<x-templates.resources.edit>
    <form wire:submit.prevent="save()">
        <div class="px-4 py-5 sm:px-6 bg-white dark:bg-secondary-color">
            <h3 class="mt-1 text-xl leading-6 font-semibold text-black dark:text-white uppercase">
                {{$project->reference}}
            </h3>
            <span class="text-gray-500 text-xs">ID: {{$project->id}}</span>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        {{__('Customer')}}
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <livewire:forms.customers
                            name="customer"
                            value="{{$project->customer->id}}"
                            placeholder="Choose a Customer"
                            :searchable="true"
                        />
                        @error('customer')
                        <span class="text-sm text-red-700 ml-2 error self-center font-medium">*{{ $message }}</span>
                        @enderror
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        {{__('Reference')}}
                    </dt>
                    <dd class="mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                        <input wire:model="reference" type="text" name="reference" id="reference"
                               class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700 uppercase"
                               maxlength="20">
                        @error('reference')
                        <span class="text-sm text-red-700 ml-2 error self-center font-medium">*{{ $message }}</span>
                        @enderror
                    </dd>
                </div>

                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        {{__('Project Color Identifier')}} <span class="text-red-700">*</span>
                    </dt>
                    <dd class="mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                        <input wire:model="color" type="color" name="color" id="color" class="w-full rounded-pill sm:text-sm " maxlength="20">
                        @error('color')
                        <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                        @enderror
                    </dd>
                </div>

                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                            {{__('Notes')}}
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <div class="mt-1">
                                <textarea wire:model="notes" id="notes" name=notes" rows="3" class="shadow-sm dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color mt-1 block w-full sm:text-sm border border-gray-300 dark:border-gray-700 rounded-md"
                                          placeholder="Project Notes Here"></textarea>
                        </div>
                        <p class="mt-1 md:mt-2 ml-2 text-sm text-gray-500">
                            If its necessary write project notes and comments.
                        </p>
                        @error('notes')
                        <span class="text-sm text-red-700 ml-2 error self-center font-medium">*{{ $message }}</span>
                        @enderror
                    </dd>
                </div>

                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        {{__('Project Manager')}}
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <livewire:forms.project-managers
                            name="projectManager"
                            :value="$this->projectManager"
                            placeholder="Choose a Project Manager"
                            :searchable="true"
                        />
                        @error('projectManager')
                        <span class="text-sm text-red-700 ml-2 error self-center font-medium">*{{ $message }}</span>
                        @enderror
                    </dd>
                </div>

                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        {{__('Price')}}
                    </dt>
                    <dd class="mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">

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
                    </dd>
                </div>

                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        {{__('Billing Status')}}
                    </dt>
                    <dd class="mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                        <select wire:model="billingStatus" id="billing-status" name="billing-status" autocomplete="status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-color focus:border-primary-color sm:text-sm">
                            <option selected>Please Select</option>
                            <option value="0">Without PO</option>
                            <option value="1">With PO</option>
                            <option value="2">No productive</option>
                        </select>
                        @error('billingStatus')
                        <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                        @enderror
                    </dd>
                </div>

                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        {{__('DeadLine Date')}}
                    </dt>
                    <dd class="mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                        <input wire:model="deadline" type="date" name="deadline" id="deadline" class="w-full mt-1 focus:ring-primary-color focus:border-primary-color shadow-sm text-sm border-gray-300 rounded-md">
                        @error('deadline')
                            <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                        @enderror
                    </dd>
                </div>

                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        {{__('Sample Reception Date')}}
                    </dt>
                    <dd class="mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                        <input wire:model="sample_reception" type="date" name="sample_reception" id="sample_reception" class="w-full mt-1 focus:ring-primary-color focus:border-primary-color shadow-sm text-sm border-gray-300 rounded-md">
                        @error('sample_reception')
                         <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
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


