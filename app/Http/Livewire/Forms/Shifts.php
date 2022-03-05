<?php

namespace App\Http\Livewire\Forms;

use App\Models\Shift;
use Asantibanez\LivewireSelect\LivewireSelect;
use Illuminate\Support\Collection;
use Livewire\Component;

class Shifts extends LivewireSelect
{
    public function options($searchTerm = null) : Collection
    {
        $search= '%' . $searchTerm . '%';
        $result = array();
        $getShifts = Shift::where('name', 'like', $search)->get();;

        foreach ($getShifts as $shift) {
            $value = array(
                'value' => $shift->id,
                'description' => ucfirst($shift->name));
            array_push($result, $value);
        }

        return collect($result);
    }

    public function selectedOption($value): array
    {
        $shift = Shift::find($value);
        $this->emit('shiftToParent', $shift->id);

        return [
            'value' => $shift->id,
            'description' => ucfirst($shift->name)
        ];
    }

    public function unselectedOption(){
        $this->emit('shiftToParent', null);
    }
}
