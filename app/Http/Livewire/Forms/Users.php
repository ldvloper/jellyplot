<?php

namespace App\Http\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Collection;
use Asantibanez\LivewireSelect\LivewireSelect;
use JetBrains\PhpStorm\ArrayShape;

class Users extends LivewireSelect
{
    /**
     * @param null $searchTerm
     * @return Collection
     */
    public function options($searchTerm = null) : Collection
    {
        $search= '%' . $searchTerm . '%';
        $department = auth()->user()->currentTeam->department;
        $getUsers = User::where('name', 'like', $search)
            ->where(function($query) use ($department) {
                $query->where('department_id','=', $department->id )
                    ->orWhere('master','=',true);
            })->get();

        $result = array();
        foreach ($getUsers as $user) {
            $value = array(
                'value' => $user->email,
                'description' => $user->name);
            array_push($result, $value);
        }

        return collect($result);
    }

    public function unselectedOption(){
        $this->emit('userToParent', null);
    }

    /**
     * @param $value
     * @return array
     */
   #[ArrayShape(['value' => "mixed", 'description' => "mixed"])]
   public function selectedOption($value): array
    {
        $user = User::where('email','=', $value)->first();
        $this->emit('userToParent', $user->email);
        return [
            'value' => $user->email,
            'description' => $user->name,
        ];
    }
}
