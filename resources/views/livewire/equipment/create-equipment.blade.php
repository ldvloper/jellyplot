<form wire:submit.prevent="save">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">
                        Equipment Basic Information
                    </h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-200">
                        This information will be displayed publicly so be careful what you share.
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6">
                        <div>
                            @if(auth()->user()->master)
                                <label for="reference" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                    {{__('Department')}} <span class="text-red-700">*</span>
                                </label>
                            @endif
                                @if(auth()->user()->master)
                                    <div class="mt-1 mb-2">
                                        <div>
                                            <select wire:model="department" name="department" id="department"
                                                    class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700">
                                                <option value="">Select a Department</option>
                                                @forelse($departments as $department)
                                                    <option value="{{$department->id}}">{{$department->name_show}}</option>
                                                @empty
                                                    <option value="">{{__('There is not departments')}}</option>
                                                @endforelse
                                            </select>
                                            @error('department')
                                            <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                @else
                                    <input type="hidden" wire:model="department" name="department" id="department" value="{{auth()->user()->department_id}}">
                                @endif
                        </div>

                        <div class="mt-1 mb-2">
                            <label for="sn" class=" block text-sm font-medium text-gray-700 dark:text-gray-200">
                                {{__('Serial Number')}} <span class="text-red-700 ">*</span>
                            </label>

                            <input wire:model="sn" type="text" name="sn" id="sn"
                                   class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700"
                                   placeholder="S/N" maxlength="100">

                            @error('sn')
                            <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-1 mb-2">
                            <label for="name" class=" block text-sm font-medium text-gray-700 dark:text-gray-200">
                                {{__('Name')}} <span class="text-red-700">*</span>
                            </label>

                            <input wire:model="name" type="text" name="name" id="name"
                                   class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700"
                                   placeholder="Equipment Name" maxlength="100">

                            @error('name')
                            <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">
                        Equipment details
                    </h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-200">
                        This is extra information that will help users to identify equipment
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6">
                        <div class="mt-1 mb-2">
                        <label for="brand" class=" block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{__('Brand')}} <span class="text-red-700">*</span>
                        </label>

                        <input wire:model="brand" type="text" name="brand" id="brand"
                               class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700 Capitalize"
                               placeholder="Insert the brand" maxlength="50">

                        @error('brand')
                        <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-1 mb-2">
                        <label for="model" class=" block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{__('Model')}} <span class="text-red-700">*</span>
                        </label>

                        <input wire:model="model" type="text" name="model" id="model"
                               class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700"
                               placeholder="Insert the model" maxlength="50">

                        @error('model')
                        <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-1 mb-2">
                        <label for="version" class=" block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{__('Version')}}
                        </label>

                        <input wire:model="version" type="text" name="version" id="version"
                               class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700"
                               placeholder="Insert the version" maxlength="100">

                        @error('version')
                        <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                        @enderror
                    </div>
                    </div>
                    <div class="py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-700 hover:bg-primary-color focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-color">
                            {{__('Create Equipment')}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @if(session()->has('successNotification'))
        <script>
            var message = "{{ session('successNotification') }}";
            Toastify({
                text: message,
                duration: 3000,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                backgroundColor: "#22c55e",
                stopOnFocus: true, // Prevents dismissing of toast on hover
                onClick: function(){} // Callback after click
            }).showToast();
        </script>
    @endif
</form>
