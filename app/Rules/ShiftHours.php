<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ShiftHours implements Rule
{
    private $startTime;
    private $endTime;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($startTime,$endTime)
    {
        $this->startTime = $startTime;
        $this->endTime = $endTime;
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
        if($this->startTime >= $this->endTime)
        {
            return false;
        }
        else{
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Start Time cannot be greater than the End Time';
    }
}
