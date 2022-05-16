<form wire:submit.prevent="save">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Customer Basic Information</h3>
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
                            <div class="mt-1 mb-2">
                                <div>
                                    @if(auth()->user()->master)
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
                                    @else
                                            <input type="hidden" wire:model="department" name="department" id="department" value="{{auth()->user()->department_id}}">
                                    @endif
                                </div>
                            </div>
                    </div>

                    <div class="mt-1 mb-2">
                        <label for="name" class=" block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{__('Name')}} <span class="text-red-700">*</span>
                        </label>

                        <input wire:model="name" type="text" name="name" id="name"
                               class="w-full dark:text-white dark:bg-gray-900 focus:ring-primary-color focus:border-primary-color rounded-md sm:text-sm border-gray-300 dark:border-gray-700 capitalize"
                               maxlength="20" placeholder="Name">

                        @error('name')
                        <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="mt-1 mb-2">
                        <label for="site" class=" block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{__('Site')}} <span class="text-red-700">*</span>
                        </label>

                        <ul role="list" class="border border-gray-300 rounded-md divide-y divide-gray-200">
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
                        <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                        @enderror

                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-700 hover:bg-primary-color focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-color">
                        {{__('Create Customer')}}
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

