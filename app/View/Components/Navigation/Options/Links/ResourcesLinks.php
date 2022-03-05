<?php

namespace App\View\Components\Navigation\Options\Links;

use Illuminate\View\Component;

class ResourcesLinks extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navigation.options.links.resources-links');
    }
}
