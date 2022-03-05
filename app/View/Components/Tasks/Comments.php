<?php

namespace App\View\Components\Tasks;

use App\Models\Task;
use App\Models\TaskComment;
use Illuminate\View\Component;

class Comments extends Component
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
        return view('components.tasks.comments', [
            'comments' => TaskComment::where('task_id','=', $this->task->id)->paginate(5),
        ]);
    }

}
