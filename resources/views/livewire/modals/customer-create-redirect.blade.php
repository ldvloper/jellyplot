<div class="@if(!$showModal)hidden @else fixed @endif z-20 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white dark:bg-gray-900 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="w-full mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100" id="modal-title">
                            {{__('Add New Customer')}}
                        </h3>
                        @if(Auth::user()->master)
                            <div class="mt-2">
                                <label for="new-customer-department" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                    {{__('Department')}} <span class="text-red-700">*</span>
                                </label>
                                <select wire:model="department" id="new-customer-department" name="new-customer-department" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-transparent dark:text-white rounded-md shadow-sm focus:outline-none focus:ring-primary-color focus:border-primary-color sm:text-sm" required>
                                    <option value="" selected>Select a department</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name_show}}</option>
                                    @endforeach
                                </select>
                                @error('department')
                                <span class="text-xs text-red-700 ml-2 error self-center">*{{ $message }}</span>
                                @enderror
                            </div>
                        @endif
                        <div class="mt-2">
                            <label for="customer-name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                {{__('Customer Name')}} <span class="text-red-700">*</span>
                            </label>
                            <input wire:model.lazy="name" type="text" name="customer-name" id="customer-name"
                                   class="mt-1 w-full focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 border border-gray-300 dark:border-gray-600 bg-white dark:bg-transparent dark:text-white uppercase"
                                   maxlength="20" required autofocus>
                            @error('name')
                            <span class="text-xs text-red-700 ml-2 error self-center">*{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button wire:click="createCustomer" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-700 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    {{__('Create Customer')}}
                </button>
                <button wire:click="closeModal" class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-100 mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-700 shadow-sm px-4 py-2 text-base font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

