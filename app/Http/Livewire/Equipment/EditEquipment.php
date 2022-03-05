<?php

namespace App\Http\Livewire\equipment;

use App\Models\Department;
use App\Models\Equipment;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditEquipment extends Component
{

    public $equipment;
    //Equipment Info
    public $name,$sn, $brand, $model, $version ;
    //Equipment information
    public $department;


    //Rules for validate the inputs
    protected function rules()
    {
        return [
            'name' => 'required|min:3|max:100',
            'sn' => ['required', 'min:5', Rule::unique('equipment')->ignore($this->equipment),'max:100'],
            'brand' => 'required|max:50',
            'model' => 'required|max:50',
            'version' => 'max:100',
            'department' => 'required|numeric',
        ];
    }

    public function mount(){
        $this->sn = $this->equipment->sn;
        $this->name = $this->equipment->name;
        $this->brand = $this->equipment->brand;
        $this->model = $this->equipment->model;
        $this->version = $this->equipment->version;
        $this->department = $this->equipment->department_id;
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function save()
    {
        //Equipment Basic Information
        $validatedData = $this->validate();

        $this->equipment->department_id = $validatedData['department'];
        $this->equipment->name =  strtoupper($validatedData['name']);
        $this->equipment->sn = $validatedData['sn'];
        $this->equipment->brand = $validatedData['brand'];
        $this->equipment->model = $validatedData['model'];
        $this->equipment->version = $validatedData['version'];
        $this->equipment->editor_id = auth()->user()->id;

        if($this->equipment->isDirty()) {
            $this->equipment->update();
            session()->flash('flash.banner', 'The new Equipment has been successfully created.');
            session()->flash('flash.bannerStyle', 'success');
            return redirect()->route('equipment.show', $this->equipment->id);
        }
        else{
            return session()->flash('errorUpdating', 'No changes detected');
        }

    }


    public function render()
    {
        return view('livewire.equipment.edit-equipment',[
            'departments' => Department::all(),
        ]);
    }
}
