<?php

namespace App\Http\Livewire\Tasks\Comments;

use App\Models\Task;
use App\Models\TaskComment;
use Livewire\Component;
use Livewire\WithPagination;

class GetComments extends Component
{
    use WithPagination;
    public Task $task;


    protected $listeners = ['newComment' => 'refreshComments', 'showMore' => 'incrementComments'];

    public function refreshComments()
    {
        $this->mount();
    }


    public function deleteComment($id)
    {
        $comment = TaskComment::where('id', '=', $id)->first();
        $comment->delete();
    }

    public function render()
    {
        return view('livewire.tasks.comments.get-comments', [
            'comments' => TaskComment::where('task_id','=', $this->task->id)->orderByDesc('created_at')->get(),
        ]);
    }
}
