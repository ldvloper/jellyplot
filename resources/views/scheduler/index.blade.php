<x-vue-layout>
        <scheduler-component :user="{{ auth()->user() }}" :department="{{ auth()->user()->currentTeam->department }}"></scheduler-component>
</x-vue-layout>
