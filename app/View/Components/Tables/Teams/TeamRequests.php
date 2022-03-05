<?php

namespace App\View\Components\Tables\Teams;

use App\Models\TeamRequest;
use Illuminate\View\Component;

class TeamRequests extends Component
{
    public $team;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($team)
    {
        $this->team = $team;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(): \Illuminate\Contracts\View\View|string|\Closure
    {
        $teamUsers = auth()->user()->currentTeam->users;
        return view('components.tables.teams.team-requests', [
            'requests' => TeamRequest::where('team_id','=', $this->team)
                ->where(function ($query) use ($teamUsers) {
                    foreach ($teamUsers as $user) {
                        $query->where('user_id', '!=', $user->id);
                    }
                })->paginate(15)
        ]);
    }
}
