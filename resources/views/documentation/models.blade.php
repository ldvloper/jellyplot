<x-vue-layout>
    <div class="py-10 lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:gap-24 lg:items-center">
        <div class="relative sm:py-16 lg:py-0">
            <div class="relative mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-0 lg:max-w-none lg:py-20">
                <div class="relative rounded-2xl shadow-2xl overflow-hidden">
                    <models-component></models-component>
                </div>
            </div>
        </div>
        <div class="relative mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-0 mt-10 sm:mt-0">
            <div>
                <h2 class="text-3xl text-gray-700 tracking-tight sm:text-4xl">
                   The Jellyplot Structure
                </h2>
                <div class="mt-6 text-gray-600 space-y-6">
                    <p class="text-base leading-7">
                        {{__('The Jellyplot is based on a Model View Controller Structure that is an architectural pattern consisting in three parts: Model, View and Controller')}}.
                    </p>
                    <div class="text-base leading-7">
                        <p><b>Models:</b> Handles all the data logic</p>
                        <ul class="p-2">
                            <li class="ml-2 py-1">
                                <span class="text-blue-700">Department: </span>
                                <span class="text-sm">Jellyplot Departments</span>
                            </li>
                            <li class="ml-2 py-1">
                                <span class="text-indigo-700">User: </span>
                                <span class="text-sm">Planning Authorized users</span>
                            </li>
                            <li class="ml-2 py-1">
                                <span class="text-black">Team: </span>
                                <span class="text-sm">Organize the users by groups to offer more flexibility.</span>
                            </li>
                            <li class="ml-2 py-1">Customer</li>
                            <li class="ml-2 py-1">Project</li>
                            <li class="ml-2 py-1">Resource</li>
                            <li class="ml-2 py-1">Equipment</li>
                            <li class="ml-2 py-1">Task</li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-vue-layout>

