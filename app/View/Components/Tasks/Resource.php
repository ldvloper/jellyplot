<?php

namespace App\View\Components\Tasks;

use Illuminate\View\Component;

class Resource extends Component
{
    public $resource;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tasks.resource');
    }
}
