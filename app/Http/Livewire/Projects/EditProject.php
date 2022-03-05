<?php

namespace App\Http\Livewire\Projects;

use App\Models\Project;
use App\Rules\Projects\DeadlineDate;
use App\Rules\Projects\SampleReceptionDate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\Customer;

class EditProject extends Component
{
    //Project Info
    public $project;

    //Project Info
    public $customer, $reference, $notes, $status, $price, $billingStatus;
    //Related information
    public $projectManager;
    //Dates
    public $sample_reception, $deadline;

    protected $listeners =
        ['customerToParent', 'projectManagerToParent'];

    public function customerToParent($value)
    {
        $this->customer = $value;
    }

    public function projectManagerToParent($value)
    {
        $this->projectManager = $value;
    }

    protected function rules(){
        return[
            'customer' => 'required',
            'reference' => ['required','min:3','max:30', Rule::unique('projects')->ignore($this->project)],
            'notes' => 'max:500',
            'color' => 'required|max:20',
            'billingStatus' => 'required|numeric',
            'price' => 'required|numeric',
            'projectManager' => 'required|numeric',
            'deadline' => ['required','date', new DeadlineDate()],
            'sample_reception' => ['date',new SampleReceptionDate(), 'nullable']
        ];
    }

    protected $casts = [
        'deadline' => 'date:Y-m-d',
    ];

    public function mount(){
        if($this->project->sample_reception)
        {
            $this->fill([
                //Mounting on view (Real time validation)
                'customer' => $this->project->customer->id,
                'reference' => $this->project->reference,
                'color' => $this->project->color,
                'notes' =>  $this->project->notes,
                'billingStatus' => $this->project->billing_status,
                'price' =>  $this->project->total_cost/100,
                'projectManager' =>  $this->project->project_manager_id,
                'sample_reception' =>  date('Y-m-d', strtotime($this->project->sample_reception)),
                'deadline' =>  date('Y-m-d', strtotime($this->project->deadline))
            ]);
        }
        else{
            $this->fill([
                //Mounting on view (Real time validation)
                'customer' => $this->project->customer->id,
                'reference' => $this->project->reference,
                'color' => $this->project->color,
                'notes' =>  $this->project->notes,
                'billingStatus' => $this->project->billing_status,
                'price' =>  $this->project->total_cost/100,
                'projectManager' =>  $this->project->project_manager_id,
                'deadline' =>  date('Y-m-d', strtotime($this->project->deadline))
            ]);
        }

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(Request $request)
    {
        //Project Basic Information
        $validatedData = $this->validate();
        $this->project->customer_id = $validatedData['customer'];
        $this->project->reference = $validatedData['reference'];
        $this->project->color = $validatedData['color'];
        $this->project->notes = $validatedData['notes'];
        $this->project->billing_status = $validatedData['billingStatus'];
        $this->project->total_cost = ($validatedData['price']*100);
        $this->project->project_manager_id = $validatedData['projectManager'];

        $this->project->sample_reception = $validatedData['sample_reception'];
        $this->project->deadline = $validatedData['deadline'];

        if($this->project->isDirty()) {
            $this->project->editor_id = auth()->user()->id;
            $this->project->update();
            session()->flash('flash.banner', 'The new Project has been successfully created.');
            session()->flash('flash.bannerStyle', 'success');
            return redirect()->route('projects.show', $this->project);
        }
        else{
            return session()->flash('errorUpdating', 'No changes detected');
        }

    }

    public function render()
    {
        return view('livewire.projects.edit-project');
    }
}

