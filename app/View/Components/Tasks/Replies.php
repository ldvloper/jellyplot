<?php

namespace App\View\Components\Tasks;

use App\Models\TaskComment;
use Illuminate\View\Component;

class Replies extends Component
{
    public TaskComment $comment;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tasks.replies',
        [
            'replies' => TaskComment::find($this->comment->id)->replies()->paginate(5),
        ]);
    }
}
