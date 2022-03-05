<?php

namespace App\Http\Livewire\Management\Positions;

use App\Models\Department;
use App\Models\PositionDepartment;
use App\Rules\PositionDepartmentArray;
use Livewire\Component;

class EditPosition extends Component
{
    public $position;
    public $name, $identifier, $comment;
    public $department;
    public $arrayDepartment = [];

    protected function rules()
    {
        return [
            'name' => 'required|min:4',
            'identifier' => 'required|max:5',
            'department' => ['required', 'array', new PositionDepartmentArray()],
            'comment' => 'max:500',
        ];
    }

    public function mount()
    {
        foreach($this->position->departments as $department)
        {
            $this->arrayDepartment[$department->id] = true;
        }

        $this->fill([
            'name' => $this->position->name,
            'department' => $this->arrayDepartment,
            'comment' => $this->position->comment,
            'identifier' => $this->position->identifier
        ]);
    }

    public function save()
    {
        $validatedData = $this->validate();

        $this->position->name = $validatedData['name'];
        $this->position->comment = $validatedData['comment'];
        $this->position->identifier = $validatedData['identifier'];

        if(($this->position->isDirty()) || ($this->department != $this->arrayDepartment)) {
            if($this->department != $this->arrayDepartment)
            {
                $this->updateDepartments();
            }
            $this->position->editor_id = auth()->id();
            $this->position->update($validatedData);
            session()->flash('flash.banner', 'The Position has been updated correctly');
            session()->flash('flash.bannerStyle', 'success');
            return redirect()->route('positions.show',  $this->position->id);
        }
        else{
            return session()->flash('errorUpdating', 'No changes detected');
        }
    }

    private function updateDepartments()
    {
        PositionDepartment::where('position_id','=', $this->position->id)->delete();

        $keys = array_keys($this->department);
        foreach($keys as $departmentID)
        {
            if($this->department[$departmentID])
            {
                PositionDepartment::create([
                    'position_id' => $this->position->id,
                    'department_id' => $departmentID
                ]);
            }
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.management.positions.edit-position', [
            'position'=>$this->position,
            'departments' => Department::all(),
        ]);
    }
}
