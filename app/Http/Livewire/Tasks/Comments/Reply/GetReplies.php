<?php

namespace App\Http\Livewire\Tasks\Comments\Reply;

use App\Models\TaskComment;
use Livewire\Component;

class GetReplies extends Component
{
    public TaskComment $comment;

    protected $listeners = ['newReply' => 'refreshReplies'];

    public function mount()
    {

    }

    public function refreshReplies()
    {
        $this->mount();
    }

    public function render()
    {
        return view('livewire.tasks.comments.reply.get-replies',[
            'replies' => TaskComment::find($this->comment->id)->replies()->orderByDesc('created_at')->get(),
        ]);
    }
}
