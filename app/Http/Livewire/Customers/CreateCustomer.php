<?php

namespace App\Http\Livewire\Customers;

use App\Http\Traits\InteractsWithBanner;
use App\Models\Customer;
use App\Models\Department;
use Illuminate\Http\Request;
use Livewire\Component;

class CreateCustomer extends Component
{
    //Trait Class
    use InteractsWithBanner;

    //Declaration
    public $department,$name, $site;

    //Validation Rules
    protected function rules(){
        return[
            'department' => 'required|max:5',
            'name' => 'required|unique:customers',
            'site' => 'nullable|url',
        ];
    }

    /**
     * @param $name
     * @return string
     */
    private function bannerText($name): string
    {
        return "Customer ".$name." has been created";
    }

    //Public functions
    public function updated($propertyName)
   {
       $this->validateOnly($propertyName);
   }

    public function save()
    {
        //Project Basic Information
        $validatedData = $this->validate();
        $customer = Customer::FirstorCreate([
            'name'=> strtoupper($validatedData['name']),
        ],[
            'department_id' => $validatedData['department'],
            'site' => $validatedData['site'],
            'creator_id' => auth()->id()
        ]);

        //From InteractsWithBanner Trait
        session()->flash('flash.banner', 'The new Customer has been successfully created');
        session()->flash('flash.bannerStyle', 'success');
        $this->redirect(route('customers.show', $customer));
    }

    //Rendering
    public function render()
    {
        return view('livewire.customers.create-customer',
        [
            'departments' => Department::all(),
        ]);
    }
}
