<x-app-layout>
    <div>
    <div>
        <div class="container py-20 mx-auto px-4 sm:px-8 max-w-2xl">
            <div class="main-title my-8 text-center">
                <h1 class="pf font-extra-bold text-6xl tracking-tight">How can we help you today?</h1>
                <div class="subtitle py-5 text-gray-600">
                    <h4 class="font-light text-xl">Bite sized guides and tutorials to help you get the most out of Appy.</h4>
                </div>
            </div>
            <div x-data class="main-search mb-8 rounded-lg shadow-lg px-6 py-1 w-full flex items-center space-x-6 border border-gray-200 border-opacity-75">
                <button class="focus:outline-none" @click="$refs.search.focus()">
                    <svg
                        class="w-6 h-6 text-gray-500"
                        fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
                <input @keyup.slash.document="$refs.search.focus()" x-ref="search" type="text" placeholder="{{__('Search anything')}}" class="text-base w-3/4 bg-transparent border-none focus:ring-transparent focus:outline-none">
                <kbd @click="$refs.search.focus()" class="inline-flex items-center border border-gray-200 rounded px-2 text-sm font-sans font-medium text-gray-400"> Press / </kbd>
            </div>
        </div>
    </div>
    <div class="bg-gray-50 border-b-2 border-gray-100">
        <div class="container py-10 mx-auto px-4 sm:px-8 max-w-6xl">
            <div id="small-navigator" class="py-5">
                <div class="grid place-items-center xl:place-items-stretch md:grid-cols-3 xl:grid-cols-5 gap-4">
                    <a href="" class="rounded-2xl flex shadow-lg border border-gray-100 px-5 py-2 hover:bg-gray-100 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                        <span class="pl-2 text-gray-600 dark-text-gray-300">View All</span>
                    </a>

                    <a href="" class="rounded-2xl flex shadow-lg border border-gray-100 px-5 py-2 hover:bg-gray-100 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-emerald-400 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                        <span class="pl-2 text-gray-600">{{__('Getting Started')}}</span>
                    </a>
                    <a href="" class="rounded-2xl flex shadow-lg border border-gray-100 px-5 py-2 hover:bg-gray-100 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                        </svg>
                        <span class="pl-2 text-gray-600 dark-text-gray-300">{{__('Layout & Design')}}</span>
                    </a>
                    <a href="" class="rounded-2xl flex shadow-lg border border-gray-100 px-5 py-2 hover:bg-gray-100 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                        </svg>
                        <span class="pl-2 text-gray-600 dark-text-gray-300">{{__('Views Templates')}}</span>
                    </a>
                    <a href="" class="rounded-2xl flex shadow-lg border border-gray-100 px-5 py-2 hover:bg-gray-100 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="pl-2 text-gray-600 dark-text-gray-300">{{__('Settings')}}</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="container mx-auto py-5 px-4 sm:px-8 max-w-6xl">
            <div class="grid grid-cols-12 bg-white rounded-md">
                <div class="col-span-2 md:col-span-1 h-48 flex items-center px-6 border-r border-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="rounded-full p-2 text-emerald-400 h-15 w-15 bg-emerald-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                </div>
                <div class="col-span-10 md:col-span-11 p-5">
                    <h1 class="text-2xl font-bold">Intro to the Planner</h1>
                    <div class="container mt-2">
                        <p>
                            Et leo duis ut diam quam nulla porttitor porttitor lacus luctus accumsan tortor, lorem dolor sed viverra ipsum nunc aliquet bibendum enim eu. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.
                        </p>
                    </div>
                    <div class="mt-2">
                        <a href="" class="flex w-fit items-center text-primary-color text-base hover:underline decoration-1">
                            {{__('Learn more')}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    </div>
                    <div class="mt-5 flex items-center">
                        <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="{user.handle}"/>
                        <p class="ml-2 text-sm">
                            {{__('Written by')}} <span class="font-black text-primary-color">John Doe</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>

    </div>
</x-app-layout>
