<?php

namespace App\View\Components\Header\Breadcrumbs;

use Illuminate\View\Component;

class Index extends Component
{
    public string $resources;
    public bool $management;
    public bool $scheduler;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($resources, $management, $scheduler)
    {
        $this->resources = $resources;
        //Management
        $this->management = $management;
        $this->scheduler = $scheduler;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header.breadcrumbs.index');
    }
}
