<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class TaskCheckDates implements Rule
{
    private $start;
    private $end;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($start, $end)
    {
        $this->start= $start;
        $this->end = $end;
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
        $start = Carbon::parse($this->start);
        $end = Carbon::parse($this->end);

        if($start->lessThanOrEqualTo($end))
        {
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The End date must be greater than the start date.';
    }
}
