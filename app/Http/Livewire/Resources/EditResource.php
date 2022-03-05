<?php

namespace App\Http\Livewire\Resources;

use App\Models\Department;
use App\Models\Resource;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditResource extends Component
{

    public $resource;

    public $name,$department,$color, $price;

    protected function rules(){
        return[
            'name' => ['required','min:2','max:20', Rule::unique('resources')->ignore($this->resource)],
            'price' => 'required|numeric',
            'color' => ['required'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function mount(){
        $this->name = $this->resource->name;
        $this->price = $this->resource->price_hour/100;
        $this->color = $this->resource->color;
    }

    public function save()
    {
        //Project Basic Information
        $validatedData = $this->validate();

        $this->resource->name =  strtoupper($validatedData['name']);
        $this->resource->price_hour = $validatedData['price']*100;
        $this->resource->color = $validatedData['color'];

        if($this->resource->isDirty()) {
            $this->resource->update();
            session()->flash('flash.banner', 'The Resource has been successfully saved.');
            session()->flash('flash.bannerStyle', 'success');
        }
        return redirect()->route('resources.show', $this->resource);
    }

    public function render()
    {
        return view('livewire.resources.edit-resource');
    }
}
