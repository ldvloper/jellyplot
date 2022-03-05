<?php

namespace App\Http\Livewire\Tasks\Comments;

use App\Models\Task;
use App\Models\TaskComment;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateComment extends Component
{
    public Task $task;
    public User $user;
    public $comment;

    protected function rules()
    {
        return [
            'comment' => ['required', 'min:10', 'max:1000'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){
        //Project Basic Information
        $validatedData = $this->validate();

        $comment = TaskComment::create(
            [
                'user_id' => $this->user->id,
                'task_id' => $this->task->id,
                'comment' => $validatedData['comment'],
            ]
        );

        if($comment){
            $this->emit('newComment');
            $this->comment = '';
            return session()->flash('commentResponse', 'Comment posted');
        }
        else{
            return session()->flash('commentErrorResponse', 'Error while posting your comment');
        }
    }
    public function render()
    {
        return view('livewire.tasks.comments.create-comment');
    }
}
