<?php

namespace App\Http\Livewire\Team;

use App\Models\Task;
use App\Models\Team;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Tasks extends Component
{
    public string $search = '';
    public $resource;

    //Listener
    protected $listeners = [
        'resourceToParent'
    ];

    public function resourceToParent($value)
    {
        $this->resource = $value;
    }

    /**
     * Render, if you want to improve the
     * @return Factory|View|Application
     */
    public function render(): Factory|View|Application
    {
        //Defining the search term
        $searchTerm = '%' . $this->search . '%';
        //Returns the view with the task objects
        return view('livewire.team.tasks', [
            'tasks' => Task::query()->when($this->resource, function (Builder $query) {
                   $query->where('resource_id', '=', $this->resource);
               })->whereRelation('team', 'id', auth()->user()->currentTeam->id)
                ->where('title', 'like', $searchTerm)
                ->orderBy('title', 'desc')->get(),
        ]);
    }
}
