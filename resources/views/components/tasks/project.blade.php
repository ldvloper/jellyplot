<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="p-3 bg-primary-color">
        <h1 class="text-white font-bold text-md">{{__('Project')}}</h1>
    </div>
    <div class="px-4 py-5 sm:px-6">
        <h3 class="flex items-center mt-1 text-xl leading-6 font-semibold text-black">
         {{$project->reference}}
        </h3>
    </div>
    <div class="border-t border-gray-200">
        <dl>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    {{__('Reference')}}
                </dt>
                <dd class="flex items-center mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                    <a href="{{route('projects.show', $project->id)}}" class="hover:text-primary-color">
                        {{$project->reference}}
                    </a>
                </dd>
            </div>

            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    {{__('Customer')}}
                </dt>
                <dd class="flex items-center mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                    <a href="{{route('customers.show', $project->customer->id)}}" class="hover:text-primary-color">
                        {{$project->customer->name}}
                    </a>
                </dd>
            </div>

            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="capitalize text-sm font-medium text-gray-500">
                    {{__('Created At')}}
                </dt>
                <dd x-cloak x-data="{show:false}" class="flex items-center mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <div>
                        <span x-show="!show">
                            {{$project->created_at->diffForHumans()}}
                        </span>
                        <span x-show="show">
                            {{$project->created_at}}
                        </span>
                    </div>

                    <span class="ml-6">
                        <a x-on:click="show = !show" class="cursor-pointer">
                            <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </a>
                    </span>
                </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="capitalize text-sm font-medium text-gray-500">
                    {{__('Created By')}}
                </dt>
                <dd class="flex items-center mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                    <a href="{{route('users.show',  $project->creator->id)}}" class="hover:text-primary-color">
                        {{$project->creator->name}}
                    </a>
                </dd>
            </div>
        </dl>
    </div>
</div>
