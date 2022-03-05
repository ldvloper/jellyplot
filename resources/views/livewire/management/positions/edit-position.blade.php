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
                                    <label for="identifier" class="block text-sm font-medium text-gray-700">Identifier <span class="text-red-700">*</span></label>
                                    <input wire:model.lazy="identifier" type="text" name="identifier" id="identifier" autocomplete="name" class="mt-1 focus:ring-primary-color focus:border-primary-color block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @error('identifier') <p class="text-red-700 text-sm">*{{ $message }}</p> @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Name <span class="text-red-700">*</span></label>
                                    <input wire:model.lazy="name" type="text" name="name" id="name" autocomplete="name" class="mt-1 focus:ring-primary-color focus:border-primary-color block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @error('name') <p class="text-red-700 text-sm">*{{ $message }}</p> @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="department" class="block text-sm font-medium text-gray-700">Department <span class="text-red-700">*</span></label>
                                    <div class="mt-2 grid grid-cols-2 gap-4">
                                        @foreach ($departments as $department)
                                            <label class="items-center">
                                                <input wire:model="department.{{$department->id}}" type="checkbox" class="focus:ring-0 rounded-md form-checkbox h-5 w-5 text-primary-color">
                                                <span class="ml-1 text-xs md:text-sm text-gray-700">{{$department->name_show}}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                    @error('department') <p class="mt-2 text-red-700 text-sm">*{{ $message }}</p> @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
                                    <textarea wire:model.lazy="comment" type="text" name="comment" id="comment" autocomplete="name" class="mt-1 focus:ring-primary-color focus:border-primary-color block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                    @error('comment') <span class="text-red-700 text-sm">*{{ $message }}</span> @enderror
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
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-templates.resources.edit>





