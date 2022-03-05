<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskCommentReply extends Model
{
    use HasFactory;
    protected $fillable = [
        //CRUD
        'task_comment_id',
        'user_id',
        'reply',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * @return belongsTo
     */
    public function taskComment(): belongsTo
    {
        return $this->belongsTo(TaskComment::class, 'task_comment_id');
    }
    /**
     * @return belongsTo
     */
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
