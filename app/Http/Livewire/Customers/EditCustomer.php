<?php

namespace App\Http\Livewire\Customers;

use App\Http\Traits\InteractsWithBanner;
use App\Models\Customer;
use App\Models\Department;
use App\Rules\DepartmentCustomerEditing;
use Livewire\Component;

class EditCustomer extends Component
{
    //Trait Class
    use InteractsWithBanner;

    public $customer;
    public $department;
    public $name;
    public $site;

    protected function rules(){
        return[
            'department' => 'required|max:5',
            'name' => [
                'required','min:2','max:20',
                new DepartmentCustomerEditing($this->department, $this->customer->name)
            ],
            'site' => 'nullable|url',
        ];
    }

    /**
     * @param $name
     * @return string
     */
    private function bannerText($name): string
    {
        return "Customer ".$name." has been updated correctly";
    }


    //Public Functions

    public function mount(){
        $this->name = $this->customer->name;
        $this->department = $this->customer->department_id;
        //Null if the string length is minor or equal than 1
        if(strlen($this->customer->site)<=1) {$this->site = null;}
        else{$this->site = $this->customer->site;}
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        //Equipment Basic Information
        $validatedData = $this->validate();

        //Update via Eloquent
        $this->customer->department_id = $validatedData['department'];
        $this->customer->name =  strtoupper($validatedData['name']);
        $this->customer->site = $validatedData['site'];
        $this->customer->editor_id = auth()->id();

        //Validation if the model is dirty
        if($this->customer->isDirty()) {
            $this->customer->update();
            session()->flash('flash.banner', 'The Customer has been saved');
            session()->flash('flash.bannerStyle', 'success');
            $this->redirect(route('customers.show', $this->customer));
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.customers.edit-customer',
            ['departments' => Department::all()]
        );
    }
}
