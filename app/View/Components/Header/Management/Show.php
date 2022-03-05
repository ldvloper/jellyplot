<?php

namespace App\View\Components\Header\Management;

use Illuminate\View\Component;

class Show extends Component
{
    public $object;
    public $title;
    public string $objects;
    public bool $userPlanning;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($object, $title, $objects, $userPlanning)
    {
        $this->object = $object;
        $this->title = $title;
        $this->objects = $objects;
        $this->userPlanning = $userPlanning;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header.management.show');
    }
}
