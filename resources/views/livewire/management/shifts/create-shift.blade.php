<form wire:submit.prevent="save">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Basic Information</h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-200">
                    {{__('This is the basic shift information it will be available in tasks resources for all user so be careful
                        what you create.')}}
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{__('Name')}} <span class="text-red-700">*</span>
                        </label>
                        <div class="mt-1 mb-2">
                            <input wire:model="name" type="text" name="reference" id="name"
                                   class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700"
                                   placeholder="{{__('Shift Name')}}" maxlength="15" >
                            @error('name')
                            <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-8">
                        <div>
                            <label for="start-time" class="block text-sm font-medium text-gray-700">
                                {{__('Start Time')}} <span class="text-red-700">*</span>
                            </label>
                            <div class="mt-1 mb-2">
                                <input wire:model.lazy="startTime" placeholder="24 hour format" type="number" min="0" max="24" id="start-time" name="start-time" autocomplete="start-time" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-color focus:border-primary-color sm:text-sm">
                                @error('startTime')
                                <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="end-time" class="block text-sm font-medium text-gray-700">
                                {{__('End Time')}} <span class="text-red-700">*</span>
                            </label>
                            <div class="mt-1 mb-2">
                                <input wire:model.lazy="endTime" placeholder="24 hour format" type="number" min="0" max="24" id="end-time" name="end-time" autocomplete="end-time" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-color focus:border-primary-color sm:text-sm">
                                @error('endTime')
                                    <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-700 hover:bg-primary-color focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-color">
                        {{__('Create Shift')}}
                    </button>
                </div>
            </div>
        </div>
    </div>

</form>
