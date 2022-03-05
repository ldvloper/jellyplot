<?php

namespace App\Http\Livewire\Management\Users;

use App\Models\Position;
use App\Models\ProjectManager;
use App\Models\TestManager;
use App\Models\WorkPosition;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class EditUser extends Component
{
    public $user;
    public $name, $email, $position_id, $department_id, $password, $master;

    protected $rules = [
        'name' => 'required|min:4',
        'email' => 'required|email',
        'department_id' => 'required|numeric',
        'position_id' => 'required|numeric',
        'master' => 'required|bool',
    ];

    protected $listeners = ['generatePassword' => 'generateNewPassword'];

    public function mount()
    {
        $this->fill([
                'name' => $this->user->name,
                'email' => $this->user->email,
                'department_id' => $this->user->department->id,
                'position_id' => $this->user->position->id,
                'master' => $this->user->master
            ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function generateNewPassword()
    {
        $this->password = Str::random(10);
        session()->flash('newPasswordGenerated', $this->password);
    }

    public function save()
    {
        $validatedData = $this->validate();
        $this->user->name = $validatedData['name'];
        $this->user->email = $validatedData['email'];
        $this->user->department_id = $validatedData['department_id'];
        $this->user->position_id = $validatedData['position_id'];
        $this->user->master = $validatedData['master'];

        if($this->user->isDirty()) {
            $this->user->update($validatedData);
            if($this->password){
                $this->user->password = Hash::make($this->password);
                $this->user->save();
            }
            session()->flash('flash.banner', 'The User has been updated correctly');
            session()->flash('flash.bannerStyle', 'success');
            return redirect()->route('users.show',  $this->user->id);
        }
        else{
            return session()->flash('errorUpdating', 'No changes detected');
        }


    }


    public function render(): Factory|View|Application
    {
        return view('livewire.management.users.edit-user', [
            'user'=>$this->user,
            'departments' => Department::all(),
            'positions' => Position::whereHas('departments', function ($query){
                $query->where('position_departments.department_id', '=', $this->department_id);
            })->get(),
        ]);
    }
}
