<x-templates.resources.edit>
<div class="p-5 mt-10 sm:mt-0">
    <form wire:submit.prevent="save" role="form">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <div class="px-4 sm:px-0">
            <h3 class="text-xl font-medium leading-6 text-gray-900 dark:text-gray-100">Personal Information</h3>
            <p class="mt-1 text-sm dark:text-gray-200">
              Edit the user information, password and permissions.
            </p>
          </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-gray-100 sm:p-6">
                <div class="grid grid-cols-1 gap-6">
                  <div class="col-span-6 sm:col-span-3">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input wire:model.lazy="name" type="text" name="name" id="name" autocomplete="name" class="mt-1 focus:ring-primary-color focus:border-primary-color block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('name') <p class="text-red-700 text-xs italic">{{ $message }}</p> @enderror
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                    <input wire:model.lazy="email" type="email" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-primary-color focus:border-primary-color block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('email') <p class="text-red-700 text-xs italic">{{ $message }}</p> @enderror
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                    <select wire:model.lazy="department_id" id="department" name="department_id" autocomplete="department" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-color focus:border-primary-color sm:text-sm">
                      <option disabled selected>Change Department</option>
                      @foreach ($departments as $department)
                        <option value="{{$department->id}}">{{$department->name_show}}</option>
                      @endforeach
                    </select>
                      @error('department_id') <p class="text-red-700 text-xs italic">{{ $message }}</p> @enderror
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
        <div class="md:grid md:grid-cols-3 md:gap-6 mt-10 mb-10">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-xl font-medium leading-6 text-gray-900 dark:text-gray-100">Security</h3>
                    <p class="mt-1 text-sm dark:text-gray-200">
                        Give edit the user roles and permissions
                        <br>
                        <b>This area is related with security, be secure before save and assign the permissions.</b>
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-gray-100 sm:p-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="position" class="block text-sm font-medium text-gray-700">{{__('Work Position')}}</label>
                            <select wire:model.lazy="position_id" id="position" name="position" autocomplete="type" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-color focus:border-primary-color sm:text-sm">
                                <option value="" selected>Change Position</option>
                                @foreach($positions as $position)
                                    <option value="{{$position->id}}">{{$position->name}}</option>
                                @endforeach
                            </select>
                            <a href="{{route('positions.index')}}" class="mt-2 w-full flex justify-end items-center hover:text-primary-color">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                </svg>
                                <span class="text-sm">{{__('Manage Positions')}}</span>
                            </a>
                            @error('position') <p class="text-red-700 text-xs italic">{{ $message }}</p> @enderror
                        </div>
                        <div class="w-full mt-5 grid grid-cols-2 gap-6">
                            @if(App::environment('local'))
                                <!--If Jellyplot is in LOCAL MODE you can restore the password manually-->
                                <div>
                                    <label>
                                        Password
                                    </label>
                                    <div class="flex mt-2">
                                        <input class="mt-1 focus:ring-primary-color focus:border-primary-color block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="grid-password" type="hidden" placeholder="Password" wire:model="password">
                                        <div class="flow-root">
                                            @if(session()->has('newPasswordGenerated'))
                                            <p class="text-gray-500 text-sm font-bold text-right">New password: {{session('newPasswordGenerated')}} </a></p>
                                            @else
                                            <a wire:click="$emit('generatePassword')" class="hover:text-primary-color cursor-pointer block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" title="Generate a new password">
                                                Password Reset
                                            </a>
                                          @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div x-data="{show: false}" x-init="show = {{$user->master}}" class="col-span-2 p-5 border border-primary-color rounded-md">
                                <div class="text-sm">
                                    <label for="master" class="block text-sm font-medium text-gray-700">
                                       Master Privilege
                                    </label>
                                    <label for="master" class="w-10 mt-2 flex items-center cursor-pointer">
                                        <!-- label -->
                                        <!-- toggle -->
                                        <div class="relative">
                                            <!-- input -->
                                            <input id="master" name="master" type="checkbox" class="sr-only" wire:model="master" x-on:click="show = ! show"/>
                                            <!-- line -->
                                            <div class="w-10 h-4 bg-gray-200 rounded-full shadow-inner"></div>
                                            <!-- dot -->
                                            <div class="filter drop-shadow-md dot absolute w-6 h-6 bg-gray-400 rounded-full shadow -left-1 -top-1 transition"></div>
                                        </div>
                                        <!-- label -->
                                        <div x-show="show" class="ml-3 mt-1 text-primary-color font-medium group cursor-pointer relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transition duration-500 ease-in-out transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                            </svg>
                                        </div>
                                        <div x-show="!show" class="ml-3 mt-1 text-gray-400 font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transition duration-500 ease-in-out transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                            </svg>
                                        </div>
                                    </label>
                                    <p class="text-gray-500">{{__('Check this box to assign master privilege')}}.</p>
                                    @error('master') <p class="text-red-700 text-xs italic">{{ $message }}</p> @enderror
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





