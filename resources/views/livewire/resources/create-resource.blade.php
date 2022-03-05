<form wire:submit.prevent="save">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Basic Information</h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-200">
                    {{__('This is the basic resource information it will displayed publicly for all user so be careful
                        what you share.')}}
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{__('Resource Name')}} <span class="text-red-700">*</span>
                        </label>
                        <div class="mt-1 mb-2">
                            <input wire:model="name" type="text" name="reference" id="name"
                                   class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700"
                                   placeholder="{{__('Resource Name')}}" maxlength="15" >
                            @error('name')
                            <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{__('Price Hour')}} <span class="text-red-700">*</span>
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
                        <span class="text-sm text-red-700 ml-2 error self-center font-medium">*{{ $message }}</span>
                        @enderror
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
                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{__('Identifiers and Mapping')}}</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        {{__('The information to identify the resource, you will be allowed to change the resource scheduler order after the creation')}}.
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="w-full">
                            <label for="color" class="block text-sm font-medium text-gray-700">
                                {{__('Color')}}  <span class="text-red-700">*</span>
                            </label>
                            <input wire:model="color" type="color" name="color" id="color"
                                   class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700"
                                   placeholder="{{__('Color Identifier')}}">
                            @error('color')
                            <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-700 hover:bg-primary-color focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-color">
                            {{__('Create Resource')}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
@livewire('modals.customer-create')
