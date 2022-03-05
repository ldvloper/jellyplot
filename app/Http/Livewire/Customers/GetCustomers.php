<?php

namespace App\Http\Livewire\Customers;

use App\Models\Customer;

use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class GetCustomers extends Component
{

    use WithPagination;

    public $search = '';
    public $sortBy = "asc";
    public $orderBy = "name";
    public $perPage = 10;
    public $filterDepartment;
    public $showTrashed;
    public $customer;

    //Listener
    protected $listeners = ['updateCustomers' => 'render',  'customerToParent'];

    public function customerToParent($value)
    {
        $this->customer = $value;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingDepartmentDisplay()
    {
        $this->resetPage();
    }

    public function render()
    {

        $searchTerm = '%' . $this->search . '%';
        $department = auth()->user()->currentTeam->department;
        return view('livewire.customers.get-customers',[
            'departments' => Department::all(),
            'customers' => Customer::where('department_id', '=', $department->id)
                ->where('name', 'like', $searchTerm)
                ->orderBy($this->orderBy, $this->sortBy)
                ->withTrashed($this->showTrashed)
                ->paginate($this->perPage)
        ]);
    }
}
