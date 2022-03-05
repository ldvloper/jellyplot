<?php

namespace App\Models;

use App\Http\Livewire\Forms\Projects;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static findOrFail(int $id)
 * @method static where(string $string, string $string1, string $search)
 */
class Task extends Model
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
         * 2-Status
         ******************/
        'title',
        'notes',

        /**
         * Dates & Turn
         * 1-Start
         * 2-End
         * 3-Shift (Morning / Afternoon/ Night)
         *******************/
        'start',
        'end',
        'shift_id',

        /**
         * Association:
         * 1-Department
         * 2-Team
         * 3-Project (Project)
         * 4-Resource (Room)
         * 5-Equipment
         ******************/
        'department_id',
        'team_id',
        'project_id',
        'resource_id',
        'equipment_id',
        'test_manager_id',
        'technician_id',


        /**
         * CRUD
         * 1-Project Creator ID
         * 2-Last Edition
         *********************/
        'creator_id',
        'editor_id',
    ];

    protected $appends = [
        //Hours
        'total_duration',
        'start_shift',
        'end_shift',
        'total_days',
        'cost',
    ];

    protected $with = ['project', 'project.customer','resource','equipment','team','department','creator',
        'editor','testManager', 'technician'];

    protected $casts = [
        'start' => 'date',
        'end' => 'date'
    ];

    /**
     * Return the task total duration in hours
     * @return int
     */
    public function getTotalDurationAttribute(): int
    {
        $end = Carbon::parse(($this->end));
        $start =  Carbon::parse(($this->start));

        return ($end->diffInDays($start) * $this->shift->total_hours);
    }

    public function getStartShiftAttribute()
    {
        return Carbon::parse(($this->start))->addHours($this->shift->from +1);
    }

    public function getEndShiftAttribute()
    {
        $start = Carbon::parse(($this->start))->addHours($this->shift->from + 1);
        return $start->addHours($this->shift->total_hours);
    }

    public function getTotalDaysAttribute(): array
    {
        $period = CarbonPeriod::create($this->start, $this->end);

        $result = [];
        // Iterate over the period
        foreach ($period as $date) {
            array_push($result,$date->format('Y-m-d'));
        }
        // Convert the period to an array of dates
        return $result;
    }

    public function getCostAttribute():string
    {
        //Converts Cents to Euros
        $value =  ($this->total_duration * $this->resource->price_hour/100);
        //Check the value
        if ($value >= 1000) {
            return round($value/1000, 1) . "k €";
        } else {
            return $value." €";
        }
    }


    /**
     * @return BelongsTo
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class,'department_id');
    }

    /**
     * @return BelongsTo
     */
    public function resource(): BelongsTo
    {
        return $this->belongsTo(Resource::class,'resource_id');
    }

    /**
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class,'project_id');
    }

    /**
     * @return BelongsTo
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * @return BelongsTo
     */
    public function equipment(): BelongsTo
    {
        return $this->belongsTo(Equipment::class,'equipment_id');
    }

    /**
     * @return BelongsTo
     */
    public function shift(): BelongsTo
    {
        return $this->belongsTo(Shift::class,'shift_id');
    }

    /**
     * @return BelongsTo
     */
    public function testManager(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'test_manager_id');
    }

    /**
     * @return BelongsTo
     */
    public function technician(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'technician_id');
    }

    /**
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->HasMany(TaskComment::class);
    }


    //CRUD

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
