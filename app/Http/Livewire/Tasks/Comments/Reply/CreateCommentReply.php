<?php

namespace App\Http\Livewire\Tasks\Comments\Reply;

use App\Models\Task;
use App\Models\TaskComment;
use App\Models\TaskCommentReply;
use App\Models\User;
use Livewire\Component;

class CreateCommentReply extends Component
{
    public TaskComment $taskComment;
    public User $user;
    public $reply;

    protected function rules()
    {
        return [
            'reply' => ['required', 'min:2', 'max:500'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){
        //Project Basic Information
        $validatedData = $this->validate();

        $reply = TaskCommentReply::create(
            [
                'user_id' => $this->user->id,
                'task_comment_id' => $this->taskComment->id,
                'reply' => $validatedData['reply'],
            ]
        );

        if($reply){
            $this->emit('newReply');
            $this->reply = '';
            session()->flash('replyResponse', 'Reply posted');
        }
        else{
            session()->flash('replyErrorResponse', 'Error while posting your reply');
        }
    }
    public function render()
    {
        return view('livewire.tasks.comments.reply.create-comment-reply');
    }
}
