<?php

namespace App\View\Components\Dashboard\Statistics;

use App\Models\Customer;
use App\Models\Equipment;
use App\Models\Project;
use App\Models\Resource;
use App\Models\User;
use Illuminate\View\Component;

class Resources extends Component
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
        if(auth()->user()->currentTeam->department)
        {
            $users = User::where('department_id', '=', auth()->user()->currentTeam->department->id)->get();
            $projects = Project::where('department_id', '=', auth()->user()->currentTeam->department->id)->get();
            $customers = Customer::where('department_id', '=', auth()->user()->currentTeam->department->id)->get();
            $resources = Resource::where('department_id', '=', auth()->user()->currentTeam->department->id)->get();
            $equipment = Equipment::where('department_id', '=', auth()->user()->currentTeam->department->id)->get();
        }
        else{
            $users = User::all();
            $projects = Project::all();
            $customers = Customer::all();
            $resources = Resource::all();
            $equipment = Equipment::all();
        }


        return view('components.dashboard.statistics.resources',  [
            'users' => $users,
            'projects' => $projects,
            'customers' => $customers,
            'resources' => $resources,
            'equipment' => $equipment,
        ]);
    }
}
