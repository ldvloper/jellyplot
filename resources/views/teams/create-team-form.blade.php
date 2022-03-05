<x-jet-form-section submit="createTeam">
    <x-slot name="title">
        {{ __('Team Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Create a new team to collaborate with others on projects, asociate deparments and laboratories.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6">
            <x-jet-label value="{{ __('Team Owner') }}" />

            <div class="flex items-center mt-2">
                <img class="w-12 h-12 rounded-full object-cover" src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}">

                <div class="ml-4 leading-tight">
                    <div>{{ $this->user->name }}</div>
                    <div class="text-gray-700 text-sm">{{ $this->user->email }}</div>
                </div>
            </div>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Team Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autofocus />
            <x-jet-input-error for="name" class="mt-2" />
        </div>
        <!--If Team department is null or the user is master we need to select the department-->
        @if($this->user->master)
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="department" value="{{ __('Team Department') }}" />
                <select id="department" class="mt-1 block w-full border-gray-300 focus:border-primary-color focus:ring focus:ring-primary-color focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="state.department">
                    <option hidden>Please Select</option>
                    <x-app.forms.teams.department-selection/>
                </select>
                <x-jet-input-error for="department" class="mt-2" />
            </div>
       @endif
        <!--In other cases the default team department value will be the user department-->
    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Create') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
