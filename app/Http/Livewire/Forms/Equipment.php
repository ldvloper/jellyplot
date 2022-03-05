<?php

namespace App\Http\Livewire\Forms;

use Asantibanez\LivewireSelect\LivewireSelect;
use Illuminate\Support\Collection;
use Livewire\Component;

/**
 * @method static findOrFail(int $id)
 * @method static where(string $string, string $string1, string $search)
 */
class Equipment extends LivewireSelect
{
    public function options($searchTerm = null) : Collection
    {
        $search= '%' . $searchTerm . '%';
        $result = array();
        $department = auth()->user()->currentTeam->department;
        $getEquipment = \App\Models\Equipment::where('name', 'like', $search)
            ->where('department_id','=', $department->id )->get();;

        foreach ($getEquipment as $equipment) {
            $value = array(
                'value' => $equipment->id,
                'description' => ucfirst($equipment->name));
            array_push($result, $value);
        }

        return collect($result);
    }

    public function selectedOption($value): array
    {
        $equipment = \App\Models\Equipment::find($value);
        $this->emit('equipmentToParent', $equipment->id);

        return [
            'value' => $equipment->id,
            'description' => ucfirst($equipment->name)
        ];
    }

    public function unselectedOption(){
        $this->emit('equipmentToParent', null);
    }
}
