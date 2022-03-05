<?php

namespace App\Http\Livewire\Tasks;

use App\Models\Task;
use App\Rules\TaskCheckDates;
use App\Rules\taskDate;
use Illuminate\Http\RedirectResponse;
use JetBrains\PhpStorm\ArrayShape;
use Livewire\Component;
use Illuminate\Validation\Rule;

class CreateTask extends Component
{
    //Project Info
    public $task;

    public $title, $start, $end, $shift, $notes, $resource, $project, $equipment;
    public $testManager, $technician;
    //Listener
    protected $listeners =
        ['resourceToParent', 'shiftToParent', 'projectToParent', 'equipmentToParent', 'testManagerToParent', 'technicianToParent'];

    public function resourceToParent($value)
    {
        $this->resource = $value;
    }

    public function shiftToParent($value)
    {
        $this->shift = $value;
    }

    public function projectToParent($value)
    {
        $this->project = $value;
    }

    public function equipmentToParent($value)
    {
        $this->equipment = $value;
    }

    public function testManagerToParent($value)
    {
        $this->testManager = $value;
    }

    public function technicianToParent($value)
    {
        $this->technician = $value;
    }


    //Rules for validate the inputs
    protected function rules(){
        return[
            'title' => ['required',  Rule::unique('tasks')->ignore($this->task)],
            'resource' => 'required|numeric',
            'start' => ['required'],
            'end' => ['required', new TaskDate($this->resource, $this->start), new TaskCheckDates($this->start, $this->end)],
            'shift' => 'required|numeric',
            'notes' => 'max:500',
            'project' => 'required|numeric',
            'equipment' => 'numeric|nullable',
            'testManager' => 'numeric|nullable',
            'technician' => 'numeric|nullable',
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
        $task = Task::create([
                'title' => $validatedData['title'],
                'resource_id' => $validatedData['resource'],
                'start' => $validatedData['start'],
                'end' => $validatedData['end'],
                'shift_id' => $validatedData['shift'],
                'notes' => $validatedData['notes'],
                'project_id' => $validatedData['project'],
                'equipment_id' => $validatedData['equipment'],
                'test_manager_id' => $validatedData['testManager'],
                'technician_id' => $validatedData['technician'],
                //CRUD
                'department_id' => auth()->user()->currentTeam->department->id,
                'team_id' => auth()->user()->currentTeam->id,
                'creator_id' => auth()->user()->id,
            ]
        );
        session()->flash('flash.banner', 'The task has been successfully created.');
        session()->flash('flash.bannerStyle', 'success');
        //Redirect to the project created page
        return redirect()->route('tasks.show',$task);
    }

    public function render()
    {
        return view('livewire.tasks.create-task');
    }
}
