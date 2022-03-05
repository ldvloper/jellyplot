<?php
/*
 * Jellyplot Copyright (c) 2022.
 */

namespace App\Http\Livewire\Management\Users;

use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class GetUsers extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = "asc";
    public $orderBy = "name";
    public $perPage = 10;
    public $filterDepartment;
    public $position;
    public $showTrashed = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $searchTerm = '%'.$this->search.'%';
        return view('livewire.management.users.get-users', [
            'users' => User::query()->when($this->filterDepartment, function($query){
                $query->where('department_id', $this->filterDepartment);
            }) ->where('id', '!=', auth()->id())
                ->where('name', 'like', $searchTerm)
                ->when($this->position, function($query) {
                    $query->where('position_id', $this->position);
                })->orderBy($this->orderBy, $this->sortBy)
                ->withTrashed($this->showTrashed)
                ->paginate($this->perPage),
            'departments' => Department::all(),
            'positions_department' => Department::find($this->filterDepartment),
            'positions' => Position::whereHas('departments', function ($query){
                $query->where('position_departments.department_id', '=', $this->filterDepartment);
            })->get(),
        ]);
    }
}
