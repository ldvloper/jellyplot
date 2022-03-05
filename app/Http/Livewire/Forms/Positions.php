<?php

namespace App\Http\Livewire\Forms;

use App\Models\Customer;
use App\Models\Position;
use Asantibanez\LivewireSelect\LivewireSelect;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;

class Positions extends LivewireSelect
{
    public function options($searchTerm = null) : Collection
    {
        $search= '%' . $searchTerm . '%';
        $result = array();

        $department = auth()->user()->currentTeam->department;
        $getPositions = Position::where('name', 'like', $search)
            ->where('department_id','=', $department->id )->get();
        foreach ($getPositions as $position) {
            $value = array(
                'value' => $position->id,
                'description' => $position->name);
            array_push($result, $value);
        }
        return collect($result);
    }

    #[ArrayShape(['value' => "mixed", 'description' => "mixed"])] public function selectedOption($value): array
    {
        $position = Position::find($value);
        $this->emit('positionToParent', $position->id);

        return [
            'value' => $position->id,
            'description' => $position->name
        ];
    }
    public function unselectedOption(){
        $this->emit('positionToParent', null);
    }
}
