<?php

namespace App\Http\Livewire\Forms;

use App\Models\Resource;
use Asantibanez\LivewireSelect\LivewireSelect;
use Illuminate\Support\Collection;

class Resources extends LivewireSelect
{
    /**
     * @param null $searchTerm
     * @return Collection
     */
    public function options($searchTerm = null) : Collection
    {
        $search= '%' . $searchTerm . '%';

        $result = array();
        $department = auth()->user()->currentTeam->department;

        $getResources = Resource::where('name', 'ilike', $search)->where('department_id','=', $department->id )->get();
        foreach ($getResources as $resource) {
            $value = array(
                'value' => $resource->id,
                'description' => $resource->name);
            array_push($result, $value);
        }
        return collect($result);
    }

    public function unselectedOption(){
        $this->emit('resourceToParent', null);
    }

    /**
     * @param $value
     * @return array
     */
    public function selectedOption($value): array
    {
        $resource = Resource::find($value);
        $this->emit('resourceToParent', $resource->id);
        return [
            'value' => $resource->id,
            'description' => $resource->name
        ];
    }
}
