<?php

namespace App\Http\Livewire\equipment;

use App\Models\Department;
use App\Models\Equipment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;

class CreateEquipment extends Component
{
    //Project Info
    public $name,$sn, $brand, $model, $version ;
    //Related information
    public $department;


    //Rules for validate the inputs
    protected function rules()
    {
        return [
            'name' => 'required|min:3|max:100',
            'sn' => ['required', 'min:5', 'unique:equipment','max:100'],
            'brand' => 'required|max:50',
            'model' => 'required|max:50',
            'version' => 'max:100',
            'department' => 'required|numeric',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }



    public function save()
    {
        //Project Basic Information
        $validatedData = $this->validate();

        //Check out the model attributes names are different
        $equipment = Equipment::create([
                'name' => $validatedData['name'],
                'sn' => $validatedData['sn'],
                'brand' => $validatedData['brand'],
                'model' => $validatedData['model'],
                'version' => $validatedData['version'],
                'reserved' => false,
                'department_id' => $validatedData['department'],
                'creator_id' => auth()->user()->id,
            ]
        );
        session()->flash('flash.banner', 'The new Equipment has been successfully created.');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('equipment.show', $equipment->id);
    }


    public function render(): Factory|View|Application
    {
        return view('livewire.equipment.create-equipment', [
            'departments' => Department::where('laboratory','=', true)->get(),
        ]);
    }
}
