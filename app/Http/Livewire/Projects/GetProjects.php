<?php

namespace App\Http\Livewire\Projects;

use App\Models\Customer;
use App\Models\Department;
use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class GetProjects extends Component
{
    use WithPagination;

    public $filterDepartment = '1';
    public $project;
    public $search = '';
    public $sortBy = "asc";
    public $orderBy = "customer_id";
    public $perPage = 10;
    public $showTrashed = false;
    public $customer;

    protected $listeners = [
        'customerToParent'
    ];

    public function customerToParent($value)
    {
        $this->customer = $value;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function restore($project){
         Project::withTrashed()
                ->where('id', '=', $project)
                ->restore();
         $result =  Project::find($project)->get();

         //Alert Here
    }

    /**
     * @return Factory|View|Application
     */
    public function render(): Factory|View|Application
    {
        $searchTerm = '%' . $this->search . '%';
        $department = auth()->user()->currentTeam->department;

        $projects = Project::query()->when($this->customer, function(Builder $query) use ($searchTerm) {
            $query->where('customer_id', $this->customer);
        })
            ->where('department_id', $department->id)
            ->where('reference', 'ilike', $searchTerm)
            ->orderBy($this->orderBy, $this->sortBy)
            ->withTrashed($this->showTrashed)
            ->paginate($this->perPage);

        return view('livewire.projects.get-projects',[
            'projects' => $projects,
        ]);
    }
}


