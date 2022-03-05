<?php

namespace App\Http\Livewire\Team;

use App\Models\Team;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public function render()
    {



        return view('livewire.team.users', [
            'users'=> auth()->user()->currentTeam->allUsers()
        ]);
    }
}
