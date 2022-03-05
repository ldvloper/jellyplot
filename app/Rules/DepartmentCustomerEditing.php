<?php

namespace App\Rules;

use App\Models\Customer;
use Illuminate\Contracts\Validation\Rule;

class DepartmentCustomerEditing implements Rule
{
    /**
     * Create a new rule instance.
     *
     *  @param $department
     *  @param $previousName
     * @return void
     *
     */
    public function __construct($department, $previousName)
    {
        $this->department = $department;
        $this->name = $previousName;
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

        if($customer && $customer->name != $this->name){
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
