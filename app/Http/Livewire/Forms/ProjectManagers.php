<?php

namespace App\Http\Livewire\Forms;

use App\Models\Department;
use App\Models\User;
use Asantibanez\LivewireSelect\LivewireSelect;
use Illuminate\Support\Collection;

class ProjectManagers extends LivewireSelect
{
    public function options($searchTerm = null) : Collection
    {
        $search= '%' . $searchTerm . '%';
        $result = array();

        //Getting the current team department
        $department = auth()->user()->currentTeam->department;
        $getUsers = User::whereRelation('position', 'identifier', '=', 'prj-m')
            ->where('name', 'ilike', $search)->get();

        foreach ($getUsers as $user) {
            $value = array(
                'value' => $user->id,
                'description' => $user->name);
            array_push($result, $value);
        }

        return collect($result);
    }

    public function unselectedOption(){
        $this->emit('projectManagerToParent', null);
    }

    public function selectedOption($value)
    {
        $user = User::find($value);
        $this->emit('projectManagerToParent', $user->id);
        return [
            'value' => $user->id,
            'description' => $user->name
        ];
    }



}
