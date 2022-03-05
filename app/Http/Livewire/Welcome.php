<?php

namespace App\Http\Livewire;

use App\Models\Department;
use App\Models\Position;
use Livewire\Component;

class Welcome extends Component
{
    public $department;
    public $position;

    //Rules for validate the inputs
    protected function rules(){
        return[
            'department' => 'required|numeric',
            'position' => 'required|numeric'
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $validatedData = $this->validate();
        $user = auth()->user();
        //Check out the model attributes names are different
        $user->department_id = $validatedData['department'];
        $user->position_id = $validatedData['position'];
        if($user->isDirty()) {
            $user->save();
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('dashboard')->dangerBanner("Error while saving your data.");
        }
    }

    public function render()
    {
        $departments = Department::where('laboratory', true)->get();
        return view('livewire.welcome',[
            'departments' => $departments,
            'positions' => Position::where('department_id', '=', $this->department)->get(),
        ]);
    }
}
