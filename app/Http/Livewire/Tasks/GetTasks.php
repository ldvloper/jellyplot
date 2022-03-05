<?php

namespace App\Http\Livewire\Tasks;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class GetTasks extends Component
{
    use WithPagination;

    public $filterDepartment = '1';
    public $task;
    public $search = '';
    public $sortBy = "desc";
    public $orderBy = "created_at";
    public $perPage = 10;
    public $showTrashed = false;
    public $project;
    public $resource;

    protected $listeners = [
        'resourceToParent', 'projectToParent'
    ];

    public function projectToParent($value)
    {
        $this->project = $value;
    }

    public function resourceToParent($value)
    {
        $this->resource = $value;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function restore($task){
        Task::withTrashed()
            ->where('id','=', $task)
            ->restore();
        $result =  Task::find($task);
        //Alert
    }

    /**
     * @return Factory|View|Application
     */
    public function render(): Factory|View|Application
    {
        $searchTerm = '%' . $this->search . '%';
        $department = auth()->user()->currentTeam->department;

        $tasks = Task::whereHas('department', function (Builder $query) use ($department) {
            $query->where('id', '=', $department->id);
        })->when($this->resource, function($query) {
            $query->where('resource_id', '=', $this->resource);
        })->when($this->project, function($query) {
            $query->where('project_id', '=', $this->project);
            })->where('title', 'like', $searchTerm)
            ->orderBy($this->orderBy, $this->sortBy)
            ->withTrashed($this->showTrashed)
            ->paginate($this->perPage);

        return view('livewire.tasks.get-tasks',[
            'tasks' => $tasks,
        ]);
    }
}
