<?php

namespace App\Http\Livewire\Management\Shifts;

use App\Models\Shift;
use App\Rules\ShiftHours;
use Livewire\Component;

class CreateShift extends Component
{
    public $name, $startTime, $endTime;

    //Rules for validate the inputs
    protected function rules()
    {
        return [
            'name' => 'required|unique:shifts',
            'startTime' => ['required','numeric','min:0','max:24'],
            'endTime' => ['required','numeric','min:0','max:24', new ShiftHours($this->startTime, $this->endTime)],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        //Project Basic Information
        $validatedData = $this->validate();

        //Check out the model attributes names are different
        $shift = Shift::create([
                'name' => $validatedData['name'],
                'from' => $validatedData['startTime'],
                'to' => $validatedData['endTime'],
                'creator_id' => auth()->id(),
            ]
        );
        session()->flash('flash.banner', 'The task has been successfully created.');
        session()->flash('flash.bannerStyle', 'success');
        //Redirect to the project created page
        return redirect()->route('shifts.show',$shift);
    }

    public function render()
    {
        return view('livewire.management.shifts.create-shift');
    }
}
