<?php

namespace App\Http\Livewire\Tasks;

use App\Models\Task;
use App\Rules\TaskCheckDates;
use App\Rules\TaskDate;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditTask extends Component
{
    public $task;
    public $title, $start, $end, $notes;
    public $shift, $project, $resource, $equipment;
    public $testManager, $technician;

    //Listeners
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

    protected function rules(){
        return[
            'title' => ['required',  Rule::unique('tasks')->ignore($this->task)],
            'resource' => 'required|numeric',
            'start' => ['required'],
            'end' => ['required', new TaskDate($this->resource, $this->start), new TaskCheckDates($this->start, $this->end)],
            'shift' => 'required|numeric',
            'notes' => 'max:500|nullable',
            'project' => 'required|numeric',
            'equipment' => 'numeric|nullable',
            'testManager' => 'numeric|nullable',
            'technician' => 'numeric|nullable',
        ];
    }


    //Mount on view
    public function mount(){
        //Mounting on view (Real time validation)
        $this->title = $this->task->title;
        $this->start =  date('Y-m-d', strtotime($this->task->start));
        $this->end =   date('Y-m-d', strtotime($this->task->end));
        $this->notes = $this->task->notes;

        //Relations
        $this->shift = $this->task->shift->id;
        $this->project = $this->task->project->id;
        $this->resource = $this->task->resource->id;
        $this->equipment = $this->task->equipment_id;
        $this->testManager= $this->task->test_manager_id;
        $this->technician = $this->task->technician_id;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        //Project Basic Information
        $validatedData = $this->validate();
        $this->task->title = $validatedData['title'];
        $this->task->start = $validatedData['start'];
        $this->task->end = $validatedData['end'];
        $this->task->notes = $validatedData['notes'];

        $this->task->shift_id = $validatedData['shift'];

        $this->task->project_id = $validatedData['project'];
        $this->task->resource_id = $validatedData['resource'];
        $this->task->equipment_id = $validatedData['equipment'];
        $this->task->test_manager_id = $validatedData['testManager'];
        $this->task->technician_id = $validatedData['technician'];

        if($this->task->isDirty()) {
            $this->task->editor_id = auth()->user()->id;
            $this->task->update();
            session()->flash('flash.banner', 'The Task has been successfully saved.');
            session()->flash('flash.bannerStyle', 'success');
            return redirect()->route('tasks.show', $this->task);
        }
        else{
           return session()->flash('errorUpdating', 'No changes detected');
        }
    }

    public function render()
    {
        return view('livewire.tasks.edit-task');
    }
}
