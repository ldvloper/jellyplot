<?php

namespace App\View\Components\App\Forms\Teams;

use App\Models\Department;
use Illuminate\View\Component;


class DepartmentSelection extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.app.forms.teams.department-selection',[
            'departments' => Department::where('laboratory', true)->get(),
        ]);
    }
}
