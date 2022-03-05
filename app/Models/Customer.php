<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static findOrFail(int $id)
 * @method static where(string $string, string $string1, string $search)
 */
class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        /**
         * General Data:
         * 1-Name
         * 2-Customer site
         *
         ******************/
        'name',
        'site',

        /**
         * RS:
         * 1-Department
         ******************/
        'department_id',

        /**
         * CRUD:
         * 1-Created By
         * 2-Edited By
         ******************/
        'creator_id',
        'editor_id',
        ];


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        //Costs
        'total_expenses',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function getTotalExpensesAttribute()
    {
        $value = ($this->projects->sum('current_cost'))/100;
        if ($value >= 1000) {
            return round($value/1000, 1) . "k €";
        } else {
            return $value." €";
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department():\Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    //CRUD
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id');
    }
}
