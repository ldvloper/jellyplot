<x-vue-layout v-cloak>
    <main class="lg:pt-0 py-2 bg-gray-100 dark:bg-gray-800">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-1 py-5 rounded-md">
            <div id="app" class="lg:grid lg:grid-cols-2 gap-8 xl:mx-4 text-white">
                <div class="pt-4 md:pt-0 mb-4 mx-2 sm:ml-4 xl:mr-4 rounded-md col-span-2">
                    <div class="text-2xl bg-primary-color p-2 rounded-t-md">
                        Your Contributions
                    </div>
                    <user-projects-contribution :user="{{auth()->user()}}"></user-projects-contribution>
                </div>
            </div>
            <div>
                <div class="pt-4 md:pt-0 mb-4 mx-2 sm:ml-4 xl:mr-4">
                    @if(auth()->user()->currentTeam->id != auth()->user()->personalTeam()->id)
                        @livewire('team.tasks')
                    @else
                       @livewire('team.get-teams')
                    @endif
                </div>
            </div>
        </div>
        <div x-data="{showButton: false}" x-cloak class="w-full">
            <div class="flex justify-center items-center mb-4 ml-4 xl:mr-4 ">
                <div>
                    <div class="px-6 py-12">
                        <div x-show="!showButton" x-on:click="showButton = !showButton"
                             class="max-w-sm mx-auto p-6 flex items-center bg-white rounded-xl shadow-xl
                             space-x-4 cursor-pointer">
                            <div class="shrink-0">
                                <svg class="h-12 w-12" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="a">
                                            <stop stop-color="#{{config('app.primary_light_color')}}" offset="0%"></stop>
                                            <stop stop-color="#{{config('app.primary_color')}}" offset="100%"></stop>
                                        </linearGradient>
                                        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="b">
                                            <stop stop-color="#{{config('app.primary_light_color')}}" offset="0%"></stop>
                                            <stop stop-color="#{{config('app.primary_color')}}" offset="100%"></stop>
                                        </linearGradient>
                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <path d="M28.872 22.096c.084.622.128 1.258.128 1.904 0 7.732-6.268 14-14 14-2.176 0-4.236-.496-6.073-1.382l-6.022 2.007c-1.564.521-3.051-.966-2.53-2.53l2.007-6.022A13.944 13.944 0 0 1 1 24c0-7.331 5.635-13.346 12.81-13.95A9.967 9.967 0 0 0 13 14c0 5.523 4.477 10 10 10a9.955 9.955 0 0 0 5.872-1.904z" fill="url(#a)" transform="translate(1 1)"></path>
                                        <path d="M35.618 20.073l2.007 6.022c.521 1.564-.966 3.051-2.53 2.53l-6.022-2.007A13.944 13.944 0 0 1 23 28c-7.732 0-14-6.268-14-14S15.268 0 23 0s14 6.268 14 14c0 2.176-.496 4.236-1.382 6.073z" fill="url(#b)" transform="translate(1 1)"></path>
                                        <path d="M18 17a2 2 0 1 0 0-4 2 2 0 0 0 0 4zM24 17a2 2 0 1 0 0-4 2 2 0 0 0 0 4zM30 17a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" fill="#FFF"></path>
                                    </g>
                                </svg>
                            </div>
                            <div x-transition:enter="transition ease-out duration-500"
                               x-transition:enter-start="opacity-0 scale-90">
                                <div class="text-base sm:text-xl font-medium text-black">{{__('Team Chat')}}</div>
                                    <p class="text-sm sm:text-base text-slate-500">
                                        @if($messages)
                                            {{__('Check the messages!')}}
                                        @else
                                            {{__('Start New Chat!')}}
                                        @endif
                                    </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rounded-2xl bg-white dark:bg-gray-700 w-screen" x-show="showButton"  x-show="open"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-90"
                 >
                    @livewire('team.chat.general')
                </div>
            </div>
        </div>
    </main>
</x-vue-layout>


