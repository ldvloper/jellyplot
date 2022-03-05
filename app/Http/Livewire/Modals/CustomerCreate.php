<?php

namespace App\Http\Livewire\Modals;

use App\Models\Customer;
use App\Models\Department;

use App\Rules\DepartmentCustomer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\ArrayShape;
use Livewire\Component;

class CustomerCreate extends Component
{
    public $name;
    public $showModal = false;

    protected $listeners = ['openModal'];

    #[ArrayShape(['name' => "array"])] protected function rules(): array
    {
        return[
            'name' => ['required','min:2','max:20',new DepartmentCustomer(auth()->user()->currentTeam->department->id)]
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
            Customer::firstOrCreate([
                'name' => strtoupper($validatedData['name']),
                ],[
                'department_id' => auth()->user()->currentTeam->department->id,
                'creator_id' => auth()->id(),
            ]);
        $this->emit('updateCustomers');
        $this->reset('name');
        $this->closeModal();
    }

    public function render(): Factory|View|Application
    {
        if(auth()->user()->master){
            return view('livewire.modals.customer-create', [
                'departments'=> Department::all(),
            ]);
        }
        return view('livewire.modals.customer-create');
    }
}
