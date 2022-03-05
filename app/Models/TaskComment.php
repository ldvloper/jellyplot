<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskComment extends Model
{
    use HasFactory;

    protected $fillable = [
        //CRUD
        'user_id',
        'task_id',
        'comment',
    ];


    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * @return belongsTo
     */
    public function task():belongsTo
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    /**
     * @return hasMany
     */
    public function replies(): hasMany
    {
        return $this->hasMany(TaskCommentReply::class, 'task_comment_id');
    }

    /**
     * @return belongsTo
     */
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
