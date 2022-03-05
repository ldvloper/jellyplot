<?php

namespace App\Rules;

use App\Models\Resource;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;

class TaskDate implements Rule
{

    private $resource;
    private $start;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($resource, $start)
    {
        $this->resource = $resource;
        $this->start = $start;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $start = $this->start;
        $data = Resource::whereHas('tasks', function (Builder $query) use ($start, $value){
            $query->whereBetween('start', [$start,$value]);
        })->get();
        if($data)
        {
            return true;
        }
        else{
            return false;
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The dates you selected are already reserved on the selected resource';
    }
}
