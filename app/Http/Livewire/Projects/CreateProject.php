<?php
namespace App\Http\Livewire\Projects;

use App\Models\Customer;
use App\Models\Project;
use App\Models\ProjectManager;
use App\Models\User;
use App\Rules\Projects\DeadlineDate;
use App\Rules\Projects\SampleReceptionDate;
use App\TokenStore\TokenCache;
use Beta\Microsoft\Graph\Model\DriveItem;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Request;
use Livewire\WithFileUploads;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;

use Livewire\Component;

class CreateProject extends Component
{
    //Getter
    public $project;

    //Fillable
    public $customer, $reference, $color, $notes, $status, $price;
    //Related information
    public $projectManager;
    //Dates
    public $deadlineDate;

    //Sample reception
    public $sampleReception, $sampleReceptionCode, $sampleReceptionDate;

    //Listener
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

    //Rules for validate the inputs
    protected function rules(){
        return[
            'customer' => 'required',
            'reference' => ['required','min:3','max:30',  Rule::unique('projects')->ignore($this->project)],
            'color' => 'required|max:20',
            'notes' => 'max:500',
            'status' => 'required',
            'price' => 'required|numeric',
            'projectManager' => 'required|numeric',
            'deadlineDate' => ['required','date', new DeadlineDate()],
            'sampleReceptionCode' => ['string', 'required_if:sampleReception,true'],
            'sampleReceptionDate' => ['date', new SampleReceptionDate(), 'required_if:sampleReception,true'],
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
        $project = Project::create([
                'customer_id' => $validatedData['customer'],
                'reference' => $validatedData['reference'],
                'color' => $validatedData['color'],
                'notes' => $validatedData['notes'],
                'billing_status' => $validatedData['status'],
                'department_id' => auth()->user()->currentTeam->department->id,
                'total_cost' => ($validatedData['price']*100),
                'project_manager_id' => $validatedData['projectManager'],
                'deadline' => $validatedData['deadlineDate'],
                'creator_id' => auth()->user()->id,
            ]
        );

        if($this->sampleReception)
        {
            $project->sample_reception = $validatedData['sampleReceptionDate'];
            $project->save();
        }

        //Redirect to the project created page with alert
        session()->flash('flash.banner', 'The new Project has been successfully created.');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('projects.show',$project);
    }

    //Defining as null in order to protect the Reception Date
    public function sampleReceived(){
       //NULLABLE
    }

    //Rendering the view
    public function render(): Factory|View|Application
    {
       //Discriminating master users with
        return view('livewire.projects.create-project');
    }

}


