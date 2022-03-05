<form wire:submit.prevent="save">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Basic Information</h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-200">
                    {{__('This is the basic position information it will displayed publicly for all user so be careful
                        what you share.')}}
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6">
                    <div>
                        <label for="identifier" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{__('Identifier')}} <span class="text-red-700">*</span>
                        </label>
                        <div class="mt-1 mb-2">
                            <input wire:model="identifier" type="text" name="identifier" id="identifier"
                                   class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700"
                                   placeholder="{{__('Identifier')}}" maxlength="5" >
                            @error('identifier')
                                <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{__('Name')}} <span class="text-red-700">*</span>
                        </label>
                        <div class="mt-1 mb-2">
                            <input wire:model="name" type="text" name="reference" id="name"
                                   class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700"
                                   placeholder="{{__('Position Name')}}" maxlength="15" >
                            @error('name')
                            <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                        <div>
                            <label for="department" class="block text-sm font-medium text-gray-700">Department <span class="text-red-700">*</span></label>
                            <div class="mt-2 grid grid-cols-2 gap-4">
                                @foreach ($departments as $department)
                                    <label class="items-center">
                                        <input wire:model="department.{{$department->id}}" type="checkbox" class="rounded-md focus:ring-0 shadow-none form-checkbox h-5 w-5 text-primary-color">
                                        <span class="ml-1 text-xs md:text-sm text-gray-700">{{$department->name_show}}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('department') <p class="mt-2 text-red-700 text-sm">*{{ $message }}</p> @enderror
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
                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{__('Comments')}}</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        {{__('The information to identify the resource, you will be allowed to change the resource scheduler order after the creation')}}.
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div>
                            <label for="comment" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                {{__('Comment')}}
                            </label>
                            <div class="mt-1 mb-2">
                            <textarea wire:model="comment" type="text" name="comment" id="comment"
                                      class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700"
                                      placeholder="{{__('Your Comment Here')}}" maxlength="500"></textarea>
                                @error('comment')
                                    <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-700 hover:bg-primary-color focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-color">
                            {{__('Create Position')}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
