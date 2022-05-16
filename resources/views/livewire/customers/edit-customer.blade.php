<x-templates.resources.edit>
    <form wire:submit.prevent="save">
        <div class="px-4 py-5 sm:px-6 bg-white dark:bg-secondary-color">
            <h3 class="mt-1 text-xl leading-6 font-semibold text-black dark:text-white uppercase">
                {{$customer->name}}
            </h3>
            <span class="text-gray-500 text-xs">ID: {{$customer->id}}</span>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        {{__('Department')}}
                    </dt>
                    <dd class="mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                        <select wire:model="department" name="department" id="department"
                                class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700">
                            @foreach($departments as $department)
                                <option value="{{$department->id}}">{{$department->name_show}}</option>
                            @endforeach
                        </select>
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        {{__('Name')}}
                    </dt>
                    <dd class="mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                        <input wire:model="name" type="text" name="name" id="name"
                               class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700 uppercase"
                               maxlength="20">
                        @error('name')
                        <span class="text-sm text-red-700 ml-2 error self-center font-medium">*{{ $message }}</span>
                        @enderror
                    </dd>
                </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Related Site
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                    <div class="w-0 flex-1 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                        </svg>
                                        <span class="ml-2 flex-1 w-0 truncate">
                                               <input wire:model="site" type="text" name="site" id="site"
                                                      class="w-full p-0 dark:text-white dark:bg-gray-900 focus:ring-none focus:border-none sm:text-sm border-none dark:border-gray-700"
                                                      maxlength="100" placeholder="https://example.com">
                                        </span>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <a href="{{$site}}" target="_blank" class="font-medium text-primary-color hover:text-secondary-color">
                                            View
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            @error('site')
                            <span class="text-sm text-red-700 ml-2 error self-center font-medium">*{{ $message }}</span>
                            @enderror
                        </dd>
                    </div>
            </dl>
        </div>
        <div class="px-4 py-3 bg-white dark:bg-secondary-color text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-700 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-color">
                <svg xmlns="http://www.w3.org/2000/svg" class="animate-pulse h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                </svg>
                <span class="pl-2">{{__('Save Customer')}}</span>
            </button>
        </div>
    </form>
</x-templates.resources.edit>
