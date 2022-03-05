<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shift extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        //Times & Dates
        'from',
        'to',
        //CRUD
        'creator_id',
        'editor_id'
    ];

    protected $appends = [
        //Hours
        'total_hours',
        //Name
        'name_capitalized'
    ];

    public function getNameCapitalizedAttribute(){
        return ucfirst($this->name);
    }
    /**
     * @return HasMany
     */
    public function tasks(): hasMany
    {
        return $this->hasMany(Task::class);
    }

    /**
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
    /**
     * @return BelongsTo
     */
    public function editor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'editor_id');
    }

    public function getTotalHoursAttribute(){
        return (($this->to) - ($this->from));
    }
}
