<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static findOrFail(int $id)
 * @method static where(string $string, string $string1, string $search)
 */
class Position extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        /**
         * General Data:
         * 1-Reference
         * 2-Status
         ******************/
        'identifier',
        'name',
        'comment',
        'creator_id',
        'editor_id',
    ];


    /**
     * @return BelongsToMany
     */
    public function departments(): BelongsToMany
    {
        return $this->belongsToMany(Department::class,'position_departments');
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
}
