<?php

namespace App\View\Components\App\UI;

use App\Models\Task;
use Illuminate\View\Component;

class Calendar extends Component
{
    public Task $task;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($task)
    {
        $this->task = $task;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.app.ui.calendar',[
            'index' => 2,
            'indexDays'=> 2,
            'indexHours'=> 2,
        ]);
    }
}
