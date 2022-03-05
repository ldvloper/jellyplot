<x-templates.resources.edit>
    <form wire:submit.prevent="save()">
        <div class="px-4 py-5 sm:px-6 bg-white dark:bg-secondary-color">
            <h3 class="mt-1 text-xl leading-6 font-semibold text-black dark:text-white uppercase">
                {{$equipment->name}}
            </h3>
            <span class="text-gray-500 text-xs">S/N: {{$equipment->sn}}</span>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        {{__('Department')}}
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <div class="mt-1">
                            <select wire:model="department" name="department" id="department"
                                    class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700">
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name_show}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('department')
                        <span class="text-sm text-red-700 ml-2 error self-center font-medium">*{{ $message }}</span>
                        @enderror
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        {{__('Serial Number')}}
                    </dt>
                    <dd class="mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                        <input wire:model="sn" type="text" name="sn" id="sn"
                               class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700 uppercase"
                               maxlength="100">
                        @error('sn')
                        <span class="text-sm text-red-700 ml-2 error self-center font-medium">*{{ $message }}</span>
                        @enderror
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        {{__('Name')}}
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <div class="mt-1">
                            <input wire:model="name" type="text" name="name" id="name"
                                   class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700 uppercase"
                                   maxlength="100">
                        </div>
                        @error('name')
                        <span class="text-sm text-red-700 ml-2 error self-center font-medium">*{{ $message }}</span>
                        @enderror
                    </dd>
                </div>

                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        {{__('Brand')}}
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <input wire:model="brand" type="text" name="brand" id="brand"
                               class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700 uppercase"
                               maxlength="50">
                        @error('brand')
                        <span class="text-sm text-red-700 ml-2 error self-center font-medium">*{{ $message }}</span>
                        @enderror
                    </dd>
                </div>

                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        {{__('Model')}}
                    </dt>
                    <dd class="mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                        <input wire:model="model" type="text" name="model" id="model"
                               class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700 uppercase"
                               maxlength="20">
                        @error('model')
                        <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                        @enderror
                    </dd>
                </div>

                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        {{__('Version')}}
                    </dt>
                    <dd class="mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                        <input wire:model="version" type="text" name="version" id="version"
                               class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700 uppercase"
                               maxlength="50">
                        @error('version')
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
