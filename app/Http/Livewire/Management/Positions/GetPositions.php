<?php

namespace App\Http\Livewire\Management\Positions;

use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class GetPositions extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = "asc";
    public $orderBy = "name";
    public $perPage = 10;
    public $filterDepartment;
    public $showTrashed = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $searchTerm = '%'.$this->search.'%';
        return view('livewire.management.positions.get-positions', [
            'positions' => Position::query()->when($this->filterDepartment, function($query) use ($searchTerm) {
                $query->whereHas('departments', function ($query){
                    $query->where('position_departments.department_id', '=', $this->filterDepartment);
                });
            })->where('name', 'ilike', $searchTerm)
            ->orderBy($this->orderBy, $this->sortBy)
            ->withTrashed($this->showTrashed)
            ->paginate($this->perPage),
            'departments' => Department::all(),
        ]);
    }

}
