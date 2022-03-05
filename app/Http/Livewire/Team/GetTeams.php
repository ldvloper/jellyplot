<?php

namespace App\Http\Livewire\Team;

use App\Models\Department;
use App\Models\Team;
use App\Models\TeamRequest;
use App\Support\Collection;
use Livewire\Component;


class GetTeams extends Component
{
    public string $search = '';
    public $department;
    public $sentRequest = false;

    public function render()
    {
        return view('livewire.team.get-teams', [
            'teams' => $this->getTeams(),
            'requests' => TeamRequest::where('user_id', '=', auth()->user()->id)
            ]);
    }

    public function checkRequest($id)
    {
        $result =  TeamRequest::where([
            ['user_id','=', auth()->user()->id],
            ['team_id','=', $id],
        ])->get();
        if($result->isNotEmpty()){
            $this->sentRequest = true;
        }
    }

    public function sendRequest($userID, $teamID)
    {
        $check = TeamRequest::where([
            ['user_id','=', $userID],
            ['team_id','=', $teamID],
            ])->get();

        if($check->isEmpty())
        {
            TeamRequest::create([
                'user_id' => $userID,
                'team_id' => $teamID,
            ]);
            $this->requestSent = true;
        }
    }

    private function  getTeams()
    {
        //Defining the search term
        $searchTerm = '%' . $this->search . '%';

        if($this->department == null)
        {
            return Team::has('department')
                ->where('user_id', '!=', auth()->user()->id)
                ->where('name', 'like', $searchTerm)
                ->orderBy('name', 'desc')->paginate(10);
        }
        else{
            $department = $this->department;
            return Team::whereHas('department', function ($query) use ($department){
                $query->where('department_id','=', $department);
            })->where('name', 'like', $searchTerm)->orderBy('name', 'desc')->paginate(10);
        }

    }

}
