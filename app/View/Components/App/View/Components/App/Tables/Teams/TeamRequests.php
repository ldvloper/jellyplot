<?php

namespace App\View\Components\app\View\Components\App\Tables\Teams;

use Illuminate\View\Component;

class TeamRequests extends Component
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
        return view('components.app.view.components.app.tables.teams.team-requests');
    }
}
