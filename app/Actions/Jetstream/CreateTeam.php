<?php

namespace App\Actions\Jetstream;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Contracts\CreatesTeams;
use Laravel\Jetstream\Events\AddingTeam;
use Laravel\Jetstream\Jetstream;

class CreateTeam implements CreatesTeams
{
    /**
     * Validate and create a new team for the given user.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return mixed
     */
    public function create($user, array $input)
    {
        //If Team department is not null or the user is not master we need to select the default user value.
        if(($user->department !== null) && !($user->master)){
            $input['department'] = $user->department->id;
        }

        Gate::forUser($user)->authorize('create', Jetstream::newTeamModel());
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'department' => ['required', 'integer'],
        ])->validateWithBag('createTeam');

        AddingTeam::dispatch($user);
        $lab_id = $input['department'];
        $user->switchTeam($team = $user->ownedTeams()->create([
            'name' => $input['name'],
            'department_id' => $input['department'],
            'personal_team' => false,
        ]));

        return $team;
    }
}
