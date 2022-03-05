<x-app-layout>
    <x-slot name="header">
        <x-header.breadcrumbs.show
            :title="$user->name"
            resources="users"
            :id="$user->id"
            :management="true"
            :scheduler="false"
        >
        </x-header.breadcrumbs.show>
        <x-header.management.show
            :object="$user"
            :title="$user->name"
            :user-planning="true"
            objects="users">
        </x-header.management.show>
    </x-slot>
    <div class="py-12 pb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="bg-gray-50">
                <div class="container mx-auto px-4">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg">
                        <div class="p-6">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                                    <div class="relative">
                                        <img alt="Profile Photo" src="{{$user->profile_photo_url}}" class="shadow-xl rounded-full h-32 md:h-48 align-middle border-none max-w-150-px">
                                    </div>
                                </div>
                                <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                                    <div class="py-6 px-3 mt-12 md:mt-32 sm:mt-0">
                                        <a href="mailto:{{$user->email}}" class="bg-primary-color active:bg-secondary-color uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                                            Contact
                                        </a>
                                    </div>
                                </div>
                                <div class="w-full lg:w-4/12 px-4 lg:order-1">
                                    <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                        <div class="mr-4 p-3 text-center">
                                            <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{\App\Models\Task::where('creator_id','=',$user->id)->count()}}</span><span class="text-sm text-blueGray-400">{{__('Tasks')}}</span>
                                        </div>
                                        <div class="mr-4 p-3 text-center">
                                            <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{\App\Models\Project::where('creator_id','=',$user->id)->count()}}</span><span class="text-sm text-blueGray-400">{{__('Projects')}}</span>
                                        </div>
                                        <div class="lg:mr-4 p-3 text-center">
                                            <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{\App\Models\Customer::where('creator_id','=',$user->id)->count()}}</span><span class="text-sm text-blueGray-400">{{__('Customers')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-12">
                                <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                                    {{$user->name}}
                                </h3>
                                <div class="text-2xl leading-normal mt-0 mb-2 text-primary-color font-bold uppercase">
                                    {{$user->department->name_show}}
                                </div>
                                <div class="mb-2 text-gray-900 mt-10">
                                    {{$user->position->name}}
                                </div>
                                <div class="mb-2 text-gray-900">
                                    {{$user->email}} - <b>Joined: {{$user->created_at->diffForHumans()}}</b>
                                </div>

                            </div>
                            <!--
                            <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                                <div class="flex flex-wrap justify-center">
                                    <div class="w-full lg:w-9/12 px-4">
                                        <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                                            An artist of considerable range, Jenna the name taken by
                                            Melbourne-raised, Brooklyn-based Nick Murphy writes,
                                            performs and records all of his own music, giving it a
                                            warm, intimate feel with a solid groove structure. An
                                            artist of considerable range.
                                        </p>
                                        <a href="#pablo" class="font-normal text-pink-500">Show more</a>
                                    </div>
                                </div>
                            </div>
                            -->
                        </div>
                    </div>
                </div>
                <footer class="relative bg-blueGray-200 pt-8 pb-6 mt-8">
                    <div class="container mx-auto px-4">
                        <div class="flex flex-wrap items-center md:justify-between justify-center">
                            <div class="w-full md:w-6/12 px-4 mx-auto text-center">
                                <div class="text-sm text-blueGray-500 font-semibold py-1">
                                    Last Update: <b>{{$user->updated_at->diffForHumans()}}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </section>
        </div>
    </div>
</x-app-layout>
