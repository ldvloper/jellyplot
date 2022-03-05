<?php

namespace App\Http\Livewire\Management\Positions;

use App\Models\Department;
use App\Models\Position;
use App\Models\PositionDepartment;
use App\Rules\PositionDepartmentArray;
use Livewire\Component;

class CreatePosition extends Component
{
    public $identifier, $name, $department, $comment;

    //Rules for validate the inputs
    protected function rules()
    {
        return [
            'identifier' => 'required|max:5|unique:positions',
            'comment' => 'max:500',
            'name' => 'required',
            'department' => ['required', 'array', new PositionDepartmentArray()],
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
        $position = Position::create([
                'identifier' => $validatedData['identifier'],
                'name' => $validatedData['name'],
                'comment' => $validatedData['comment'],
                'creator_id' => auth()->user()->id,
            ]
        );

        $keys = array_keys($this->department);
        foreach($keys as $departmentID)
        {
            if($this->department[$departmentID])
            {
                PositionDepartment::create([
                    'position_id' => $position->id,
                    'department_id' => $departmentID
                ]);
            }
        }
        session()->flash('flash.banner', 'The task has been successfully created.');
        session()->flash('flash.bannerStyle', 'success');
        //Redirect to the project created page
        return redirect()->route('positions.show',$position);
    }

        public function render()
    {
        return view('livewire.management.positions.create-position', [
            'departments' => Department::all()
        ]);
    }
}
