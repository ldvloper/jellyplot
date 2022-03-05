<?php

namespace App\Http\Livewire\Resources;

use App\Models\Department;
use App\Models\Resource;
use Livewire\Component;

class CreateResource extends Component
{
    //Project Info
    public $order_planning, $name, $color, $price;
    //Related information
    public $department;

    //Rules for validate the inputs
    protected function rules()
    {
        return [
            'name' => 'required|min:2|unique:resources',
            'color' => ['required', 'min:3', 'unique:resources'],
            'price' => 'required|numeric',
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

        $position = 1;
        if(Resource::orderBy('order_planning', 'desc')->first()){
            $latest = Resource::orderBy('order_planning', 'desc')->first();
            $position = ($latest->order_planning) + 1;
        }

        //Check out the model attributes names are different
        $resource = Resource::firstOrCreate([
            'name' => $validatedData['name'],
            ],[
                'order_planning' => $position,
                'department_id' => auth()->user()->currentTeam->department->id,
                'color' => $validatedData['color'],
                'price_hour' => $validatedData['price']*100,
                'creator_id' => auth()->user()->id,
            ]
        );
        //Redirect to the project created page
        session()->flash('flash.banner', 'The Resource has been successfully created.');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('resources.show', $resource);
    }


    public function render()
    {
        return view('livewire.resources.create-resource', [
            'departments' => Department::all(),
        ]);
    }
}

