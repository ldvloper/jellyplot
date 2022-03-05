<?php

namespace App\View\Components\Users;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GetOnlineUsers extends Component
{
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render(): View|string|\Closure
    {
        return view('components.users.get-online-users', [
            'user' => User::find($this->id),
        ]);
    }
}
