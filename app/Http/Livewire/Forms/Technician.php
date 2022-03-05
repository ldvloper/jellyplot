<?php

namespace App\Http\Livewire\Forms;

use App\Models\Department;
use App\Models\User;
use Asantibanez\LivewireSelect\LivewireSelect;
use Illuminate\Support\Collection;

class Technician extends LivewireSelect
{
    public function options($searchTerm = null) : Collection
    {
        $search= '%' . $searchTerm . '%';
        $technician = 'tch'. '%';
        $result = array();

        //Getting the current team department
        $department = auth()->user()->currentTeam->department;
        $getUsers = User::whereRelation('position', 'identifier', 'like', $technician)
            ->where('name', 'like', $search)->get();

        foreach ($getUsers as $user) {
            $value = array(
                'value' => $user->id,
                'description' => $user->name);
            array_push($result, $value);
        }

        return collect($result);
    }

    public function unselectedOption(){
        $this->emit('technicianToParent', null);
    }

    public function selectedOption($value)
    {
        $user = User::find($value);
        $this->emit('technicianToParent', $user->id);
        return [
            'value' => $user->id,
            'description' => $user->name
        ];
    }



}
