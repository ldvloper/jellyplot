<?php

namespace App\View\Components\navigation;

use Illuminate\View\Component;
use Mobile_Detect;

class MagicTool extends Component
{
    public Mobile_Detect $detect;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->detect = new Mobile_Detect;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navigation.magic-tool',[
            'device' => $this->detect,
        ]);
    }
}
