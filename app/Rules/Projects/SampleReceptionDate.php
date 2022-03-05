<?php

namespace App\Rules\Projects;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class SampleReceptionDate implements Rule
{
    /**
     * Create a new rule instance.
     * @return void
     */
    public function __construct()
    {

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
        if($value){
            $today = Carbon::now();
            if($today->lt(Carbon::parse($value)))
            {
                return false;
            }
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
        return 'The reception date cannot be greater than the actual date and time.';
    }
}
