<?php

namespace App\Http\Livewire\Management\Scheduler\Holidays;

use App\Models\Holiday;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use JetBrains\PhpStorm\ArrayShape;
use Livewire\Component;

class CreateHoliday extends Component
{
    public $name, $date, $annually;

    /**
     * Rules for validate the inputs
     * @return string[]
     */
    #[ArrayShape(['name' => "string", 'date' => "string", 'annually' => "string"])] protected function rules()
    {
        return [
            'name' => 'required|unique:holidays',
            'date' => 'unique:holidays',
            'annually' => 'bool',
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
        $holiday = Holiday::create([
                'name' => $validatedData['name'],
                'date' => $validatedData['date'],
                'annually' => $validatedData['annually'],
                'creator_id' => auth()->id(),
            ]
        );
        session()->flash('flash.banner', 'The task has been successfully created.');
        session()->flash('flash.bannerStyle', 'success');
        //Redirect to the project created page
        return redirect()->route('holidays.show', $holiday);
    }

    /**
     * @return Factory|View|Application
     */
    public function render(): Factory|View|Application
    {
        return view('livewire.management.scheduler.holidays.create-holiday');
    }
}
