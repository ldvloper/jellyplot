<?php

namespace App\Http\Livewire\Forms;

use App\Models\Customer;
use Asantibanez\LivewireSelect\LivewireSelect;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;
;


class Customers extends LivewireSelect
{
    public function options($searchTerm = null) : Collection
    {
        $search= '%' . $searchTerm . '%';
        $result = array();

        $department = auth()->user()->currentTeam->department;

        $getCustomers = Customer::where('name', 'ilike', $search)
            ->where('department_id','=', $department->id )->get();
            foreach ($getCustomers as $customer) {
                $value = array(
                    'value' => $customer->id,
                    'description' => $customer->name);
                array_push($result, $value);
            }
        return collect($result);
    }

    #[ArrayShape(['value' => "mixed", 'description' => "mixed"])] public function selectedOption($value): array
    {
        $customer = Customer::find($value);
        $this->emit('customerToParent', $customer->id);

        return [
            'value' => $customer->id,
            'description' => $customer->name
        ];
    }
    public function unselectedOption(){
        $this->emit('customerToParent', null);
    }

}
