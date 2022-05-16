<?php

namespace App\Http\Livewire\Forms;

use App\Models\Customer;
use App\Models\Project;
use Asantibanez\LivewireSelect\LivewireSelect;
use Illuminate\Support\Collection;
use Livewire\Component;

class Projects extends LivewireSelect
{

    public function options($searchTerm = null) : Collection
    {
        $search= '%' . $searchTerm . '%';
        $result = array();
        $department = auth()->user()->currentTeam->department;
        $getProjects = Project::where('reference', 'ilike', $search)
            ->where('department_id','=', $department->id )->get();;

        foreach ($getProjects as $project) {
            $value = array(
                'value' => $project->id,
                'description' => $project->reference);
            array_push($result, $value);
        }

        return collect($result);
    }

    public function selectedOption($value): array
    {
        $project = Project::find($value);
        $this->emit('projectToParent', $project->id);

        return [
            'value' => $project->id,
            'description' => $project->reference
        ];
    }

    public function unselectedOption(){
        $this->emit('projectToParent', null);
    }

}
