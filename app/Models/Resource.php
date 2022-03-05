<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use NumberFormatter;

/**
 * @method static findOrFail(int $id)
 * @method static where(string $string, string $string1, string $search)
 */
class Resource extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Boot function deletes with soft delete child models
     */
    protected static function boot() {
        parent::boot();

        static::deleting(function($resource) {
            $resource->tasks()->delete();
        });
    }

    protected $fillable = [
        //Main Data
        'order_planning',
        'name',
        'color',
        //Department
        'task_id',
        'department_id',
        //Pricing
        'price_hour',
        //CRUD
        'creator_id',
        'editor_id'
    ];

    /**
     * These are the resources attributes
     */
    protected $appends = [
        'order_planning_ordinal',
        'price_hour_euros',
        'color_background',
    ];

    /**
     * Return the tasks related
     * @return HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Return the department object
     * @return BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * The creator user information
     * @return BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
    /**
     * The editor user information
     * @return BelongsTo
     */
    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id');
    }


    //Return
    public function getOrderPlanningOrdinalAttribute()
    {
        $numberFormatter = new NumberFormatter('en_US', NumberFormatter::ORDINAL);
        return $numberFormatter->format($this->order_planning);
    }

    public function getPriceHourEurosAttribute():string
    {
        //Converts Cents to Euros
        $value =  ($this->price_hour/100);
        //Check the value
        if ($value >= 1000) {
            return round($value/1000, 1) . "k €";
        }
        return $value." €";

    }

    /**
     * This Attribute return the sum of all the tasks
     * time related with it, per the price/hour
     * @return int|float
     */
    public function getExpensesAttribute(): float|int
    {
        /**
         * Eager Loading:
         * We cannot access via $this->task->sum('total_duration')
         * **/
        $tasks = Task::where('resource_id','=', $this->id)->get();
        $tasksTotalDuration = $tasks->sum('total_duration');
        return ($tasksTotalDuration * $this->price_hour);
    }

    public function getColorBackgroundAttribute()
    {


    }
    /**
     * @return string
     */
    public function getColorHexAttribute(): string
    {
            if(preg_match('/^#[a-f0-9]{6}$/i', $this->color)) //hex color is valid
            {
                return $this->color;
            }
            else
            {
                $sCSSString = $this->color;

                $sRegex = '/(\d{1,3})\,?\s?(\d{1,3})\,?\s?(\d{1,3})/i';

                preg_match($sRegex, $sCSSString, $matches);

                if (count($matches) != 4) {
                    die('The color count does not match.');
                }

                $iRed = (int)$matches[1];
                $iGreen = (int)$matches[2];
                $iBlue = (int)$matches[3];

                $sHexValue = dechex($iRed) . dechex($iGreen) . dechex($iBlue);
                return '#' . $sHexValue;
            }
    }

    public function getExpensesConvertedAttribute(): string
    {
        //Converts Cents to Euros
        $value =  ($this->expenses/100);
        //Check the value
        if ($value >= 1000) {
            return round($value/1000, 1) . "k €";
        } else {
            return $value." €";
        }
    }

}
