<?php

namespace App\Http\Livewire\Modals;

use App\Models\Customer;
use App\Models\Department;
use App\Rules\DepartmentCustomer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CustomerCreateRedirect extends Component
{
    public $name, $department;
    public $showModal = false;

    protected $listeners = ['openModal'];

    protected function rules(){
        return[
            'department' => 'required',
            'name' => ['required','min:2','max:20',new DepartmentCustomer($this->department)]
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function openModal(){
        $this->showModal = true;
    }

    public function closeModal(){
        $this->showModal = false;
    }

    public function createCustomer()
    {
        $validatedData = $this->validate();
        if(auth()->user()->master){
            Customer::create([
                'department_id' => $validatedData['department'],
                'name' => strtoupper($validatedData['name']),
            ]);
        }else{
            Customer::create([
                'department_id' => auth()->user()->currentTeam()->department_id,
                'name' => strtoupper($validatedData['name']),
            ]);
        }
        $this->emit('updateCustomers');
        $this->reset('name', 'department');
        $this->closeModal();
        $this->redirect(route('customers.index'));
    }

    public function render()
    {
        if(auth()->user()->master){
            return view('livewire.modals.customer-create', [
                'departments'=> Department::all(),
            ]);
        }
        return view('livewire.modals.customer-create-redirect');
    }
}
