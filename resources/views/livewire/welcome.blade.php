<section class="h-screen px-20 grid grid-cols-1 gap-8 justify-items-center content-center">
    <h1 class="text-4xl">Welcome to
        <span class="text-primary-color">{{ config('app.name', 'Jellyplot') }}</span>
    </h1>
    <div x-cloak x-data="{show: false}" class="w-full text-center">
        <div>
            <label for="department">{{__('Select your department')}}</label>
            <div class="flex justify-center">
                <select x-on:change="show = true" wire:model="department" name="department" id="department" class="w-1/3 border-gray-300 focus:border-primary-color focus:ring focus:ring-primary-color focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                    <option selected>Select your department</option>
                    @forelse($departments as $department)
                        <option value="{{$department->id}}">{{$department->name_show}}</option>
                    @empty
                        <option selected>{{__('No departments found')}}</option>
                    @endforelse
                </select>
            </div>
        </div>
        <div x-show="show" class="mt-4">
            <label for="department">{{__('Select your position')}}</label>
            <div class="flex justify-center">
                <select  wire:model="position" name="position" id="position" class="w-1/3 border-gray-300 focus:border-primary-color focus:ring focus:ring-primary-color focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                    <option selected>Select your position</option>
                    @forelse($positions as $position)
                        <option value="{{$position->id}}">{{$position->name}}</option>
                    @empty
                        <option selected>{{__('No positions found')}}</option>
                    @endforelse
                </select>
            </div>
        </div>
        <div class="mt-5">
            <div class="py-4">
                @error('department')
                    <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                @enderror
                @error('position')
                    <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                @enderror
            </div>
            <button wire:click="save" class="inline-flex items-center px-4 py-2 bg-primary-color border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-secondary-color  disabled:opacity-25 transition">
                {{__('Finish')}}
            </button>
        </div>


    </div>
</section>
