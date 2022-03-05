<?php

namespace App\Rules;

use App\Models\Customer;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class DepartmentCustomer implements Rule
{
    /**
     * Create a new rule instance.
     *
     *  @param $param
     * @return void
     *
     */
    public function __construct($param)
    {
        $this->department = $param;
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
        $customer = Customer::where('department_id', '=', $this->department)->where('name','=', $value)->first();

        if($customer){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Another client with the same name already exists in the selected department.';
    }
}
