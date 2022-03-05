<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static findOrFail(int $id)
 * @method static where(string $string, string $string1, string $search)
 */
class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Boot function deletes with soft delete child models
     */
    protected static function boot() {
        parent::boot();

        static::deleting(function($project) {
            $project->tasks()->delete();
        });

        static::restoring(function($project) {
            $project->tasks()->restore();
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        /**
         * General Data:
         * 1-Reference
         * 2-Status
         ******************/
            'reference',
            'color',
            'notes',

        /**
         * Association:
         * 1-Department
         * 2-Customer
         * 3-Project Manager
         ******************/
            'department_id',
            'customer_id',
            'project_manager_id',

        /**
         * Dates:
         * 1-Sample Reception
         * 2-Project Deadline
         *******************/
            'sample_reception',
            'deadline',

        /**
         * Billing:
         * 1-With PO or Without PO
         * 2-Current Price € -> sum[RoomPrice/hour * totalHours]
         * 3-Total Price €
         *****************/
            'billing_status',
            'total_cost',

        /**
         * CRUD
         * 1-Project Creator ID
         * 2-Last Edition
         *********************/
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
        'current_price',
        'total_price',
    ];

    protected $dates = [
        /**
         * Dates:
         * 1-Sample Reception
         * 2-Project Deadline
         *******************/
        'sample_reception',
        'deadline',
    ];

    /**
     * @return BelongsTo
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * @return HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }


    //RS - Has One of Many
    /**
     * @return BelongsTo
     */
    public function projectManager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'project_manager_id');
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

    //Attribute Actions

    /**
     * Return the total cost in Euros
     * @return string
     */
    public function getTotalPriceAttribute(): string
    {
        $value = ($this->total_cost/100);
        if ($value >= 1000) {
            return round($value/1000, 1) . "k €";
        } else {
            return $value." €";
        }
    }


    /**
     * Return the current price in euros
     * @return string
     */
    public function getCurrentPriceAttribute(): string
    {
        return (
            (($this->current_cost)/100).' €'
        );
    }

    public function scopeRecent($query)
    {
        return $query->where('created_at', '>', (new \Carbon\Carbon)->submonths(12) );
    }
}
