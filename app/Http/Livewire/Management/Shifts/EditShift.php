<?php

namespace App\Http\Livewire\Management\Shifts;

use App\Rules\ShiftHours;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditShift extends Component
{
    public $shift;
    public $name, $startTime, $endTime;

    //Rules for validate the inputs
    protected function rules()
    {
        return [
            'name' => ['required',  Rule::unique('shifts')->ignore($this->shift)],
            'startTime' => ['required','numeric','min:0','max:24'],
            'endTime' => ['required','numeric','min:0','max:24', new ShiftHours($this->startTime, $this->endTime)],
        ];
    }

    public function mount()
    {
        $this->fill([
            'name' => $this->shift->name,
            'startTime' => $this->shift->from,
            'endTime' => $this->shift->to,
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $validatedData = $this->validate();
        $this->shift->name = $validatedData['name'];
        $this->shift->from = $validatedData['startTime'];
        $this->shift->to = $validatedData['endTime'];

        if($this->shift->isDirty()) {
            $this->shift->editor_id = auth()->id();
            $this->shift->update($validatedData);
            session()->flash('flash.banner', 'The Shift has been updated correctly');
            session()->flash('flash.bannerStyle', 'success');
            return redirect()->route('shifts.show',  $this->shift);
        }
        else{
            return session()->flash('errorUpdating', 'No changes detected');
        }

    }

    public function render()
    {
        return view('livewire.management.shifts.edit-shift');
    }
}
