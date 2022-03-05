<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static findOrFail(int $id)
 * @method static where(string $string, string $string1, string $search)
 */
class Department extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'laboratory',
        'information',
        'color',
    ];

    /**
     * The accessors to append to the model's array form.
     * @var array
     */
    protected $appends = [
        'name_show',
    ];

    /**
     * The Teams the department have Associated
     * @return string
     */
    public function getNameShowAttribute(): string
    {
        return strtoupper($this->name);
    }

    /**
     * The Teams the department have Associated
    */
    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }

    /**
     * The Users the department have Associated
    */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * The Customers the department have Associated
     */
    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class);
    }

    /**
     * The Equipment the department have Associated
     */
    public function equipment(): HasMany
    {
        return $this->hasMany(Equipment::class);
    }

    /**
     * The Resources the department have Associated
     */
    public function resources(): HasMany
    {
        return $this->hasMany(Resource::class);
    }

    /**
     * The Projects the department have Associated
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

}
