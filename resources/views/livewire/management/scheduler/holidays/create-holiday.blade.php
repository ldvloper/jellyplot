<form wire:submit.prevent="save">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Holiday Information</h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-200">
                    {{__('This is the basic Holiday information it will displayed in the planning as not working day for all users, so be careful
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
                                   class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color
                                   focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700"
                                   placeholder="{{__('Position Name')}}" maxlength="15">
                            @error('name')
                            <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700">
                            Date <span class="text-red-700">*</span>
                        </label>
                        <input wire:model="date" type="date" name="date" id="date"
                               class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color
                               focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700">
                        @error('date')
                        <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                        @enderror
                    </div>

                    <div x-cloak x-data="{show: false}" class="px-2 col-span-2 py-5">
                        <div class="text-sm">
                            <label for="annually" class="block text-sm font-medium text-gray-700">
                                {{__('Annually')}}
                            </label>
                            <label for="annually" class="w-10 mt-2 flex items-center cursor-pointer">
                                <!-- label -->
                                <!-- toggle -->
                                <div class="relative">
                                    <!-- input -->
                                    <input id="annually" name="annually" type="checkbox" class="sr-only" wire:model="annually" x-on:click="show = ! show"/>
                                    <!-- line -->
                                    <div class="w-10 h-4 bg-gray-200 rounded-full shadow-inner"></div>
                                    <!-- dot -->
                                    <div class="filter drop-shadow-md dot absolute w-6 h-6 bg-gray-400 rounded-full shadow -left-1 -top-1 transition"></div>
                                </div>
                                <!-- label -->
                                <div x-show="show" class="ml-3 mt-1 text-primary-color font-medium group cursor-pointer relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div x-show="!show" class="ml-3 mt-1 text-gray-400 font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </label>
                            <p class="text-gray-500">{{__('Check this box if the holiday repeats annually.')}}.</p>
                            @error('annually')
                            <span class="text-red-700 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-700 hover:bg-primary-color focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-color">
                            {{__('Create Holiday')}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<style>
    input:checked ~ .dot {
        filter: brightness(1);
        transform: translateX(100%);
        background-color: rgb(255, 105, 0);
    }
</style>
