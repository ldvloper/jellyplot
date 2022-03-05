<?php

namespace App\View\Components\Tasks;

use Illuminate\View\Component;

class User extends Component
{
    public $title, $user;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $user)
    {
        $this->title = $title;
        $this->user = $user;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tasks.user');
    }
}
