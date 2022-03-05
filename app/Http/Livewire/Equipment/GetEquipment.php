<?php

namespace App\Http\Livewire\Equipment;

use App\Models\Department;
use App\Models\Equipment;
use Livewire\Component;
use Livewire\WithPagination;

class GetEquipment extends Component
{
    use WithPagination;

    public Equipment $equipment;
    public string $search = '';
    public string $sortBy = "asc";
    public string $orderBy = "name";
    public $perPage = 10;
    public $showTrashed = false;
    public $filterDepartment;

    //Restore function
    public function restore($equipment){
        Equipment::withTrashed()
            ->where('id', '=', $equipment)
            ->restore();

        $result =  Equipment::find($equipment);
        if($result){
            //Show Notification
            session()->flash('alertNotification',
                'The Equipment with S/N: '.$result->sn.' has been restored');
        }
        else{
            //Show Notification
            session()->flash('errorNotification',
                'The project with S/N: '.$result->sn.' could not be restored');
        }
    }

    public function render()
    {
        if(auth()->user()->department && !auth()->user()->master){
            $this->filterDepartment = auth()->user()->department_id;
        }

        $searchTerm = '%' . $this->search . '%';
        return view('livewire.equipment.get-equipment',[
            'departments' => Department::all(),
            'equipments' => Equipment::query()->when($this->filterDepartment, function($query) use ($searchTerm) {
                $query->where('department_id', $this->filterDepartment);
            })
                ->where('name', 'like', $searchTerm)
                ->orderBy($this->orderBy, $this->sortBy)
                ->withTrashed($this->showTrashed)
                ->paginate($this->perPage)
        ]);
    }
}
