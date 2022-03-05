<?php

namespace App\Http\Livewire\Management\Scheduler\Holidays;

use Illuminate\Validation\Rule;
use Livewire\Component;

class EditHoliday extends Component
{
    public $holiday;
    public $name, $date, $annually;

    protected function rules()
    {
        return [
            'name' => ['required', Rule::unique('holidays')->ignore($this->holiday)],
            'date' => ['required', Rule::unique('holidays')->ignore($this->holiday)],
            'annually' => 'bool',
        ];
    }

    public function mount()
    {
        $this->fill([
            'name' => $this->holiday->name,
            'date' =>  date('Y-m-d', strtotime($this->holiday->date)),
            'annually' => $this->holiday->annually,
        ]);
    }

    public function save()
    {
        $validatedData = $this->validate();

        $this->holiday->name = $validatedData['name'];
        $this->holiday->date = $validatedData['date'];
        $this->holiday->annually = $validatedData['annually'];

        if($this->holiday->isDirty()) {
            $this->holiday->editor_id = auth()->id();
            $this->holiday->update($validatedData);

            session()->flash('flash.banner', 'The Position has been updated correctly');
            session()->flash('flash.bannerStyle', 'success');
            return redirect()->route('holidays.show',  $this->holiday);
        }
        else{
            return session()->flash('errorUpdating', 'No changes detected');
        }

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.management.scheduler.holidays.edit-holiday');
    }
}
