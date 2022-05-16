<x-vue-layout v-cloak>
    <div class="flex overflow-hidden bg-white">
        <x-asides.dashboard/>
        <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
            <router-view
                :user="{{auth()->user()}}"
                :team="{{auth()->user()->currentTeam}}"
                :department="{{auth()->user()->currentTeam->department}}"
                :tasks-route="'{{route('tasks.index')}}'">
            </router-view>
        </div>
    </div>
</x-vue-layout>


