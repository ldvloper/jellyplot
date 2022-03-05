<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static findOrFail(int $id)
 * @method static where(string $string, string $string1, string $search)
 */
class Equipment extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        /**
         * General Data:
         * 1-Name
         * 2-Serial Number
         * 3-Brand
         * 4-Model
         * 5-Version
         ******************/
        'name',
        'sn',
        'brand',
        'model',
        'version',

        /**
         * Association:
         * 1-Department
         * 2-Customer
         * 3-Group
         * 4-Project Manager
         * 5-Test Manager
         ******************/
        'department_id',

        /**
         * Reservation:
         * 1-Reserved
         *******************/
        'reserved',

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
        //Brand + Model
        'brand_model',
    ];

    //Return a string composed by the brand and the model
    public function getBrandModelAttribute(): string
    {
        return ($this->brand.' '.$this->model);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department():\Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

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
