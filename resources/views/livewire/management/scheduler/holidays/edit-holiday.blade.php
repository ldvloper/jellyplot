<x-templates.resources.edit>
    <div class="p-5 mt-10 sm:mt-0">
        <form wire:submit.prevent="save" role="form">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-xl font-medium leading-6 text-gray-900 dark:text-gray-100">Main Information</h3>
                        <p class="mt-1 text-sm dark:text-gray-200">
                            Edit the Position information
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-gray-100 sm:p-6">
                            <div class="grid grid-cols-1 gap-6">
                                <div class="col-span-6 sm:col-span-3">
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

                                <div class="col-span-6 sm:col-span-3">
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

                                <div x-cloak x-data="{show: false}" x-init="show = {{$holiday->annually}}" class="px-2 col-span-2 py-5">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 flex items-center justify-end">
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
    </div>
</x-templates.resources.edit>

<style>
    input:checked ~ .dot {
        filter: brightness(1);
        transform: translateX(100%);
        background-color: rgb(255, 105, 0);
    }
</style>




