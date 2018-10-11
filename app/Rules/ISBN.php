<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ISBN implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $value = str_replace(array(' ', '-', '.'), '', $value);
        $length = strlen($value);
        $checkdigit = substr($value, -1);
        if ($length == 10) {
            if ( ! is_numeric(substr($value, -10, 9))) {
                return false;
            }
            $checkdigit = ( ! is_numeric($checkdigit)) ? $checkdigit : strtoupper($checkdigit);
            $checkdigit = ($checkdigit == 'X') ? '10' : $checkdigit;
            $sum = 0;
            for ($i = 0; $i < 9; $i++) {
                $sum = $sum + ($value[$i] * (10 - $i));
            }
            $sum = $sum + $checkdigit;
            $mod = $sum % 11;
            return ($mod == 0);
        } elseif ($length == 13) {
            $sum = 0;
            $sum =  $value[0] + ($value[1] * 3) + $value[2] + ($value[3] * 3) +
                    $value[4] + ($value[5] * 3) + $value[6] + ($value[7] * 3) +
                    $value[8] + ($value[9] * 3) + $value[10] + ($value[11] * 3);
            $mod = $sum % 10;
            $correct_checkdigit = 10 - $mod;
            $correct_checkdigit = ($correct_checkdigit == "10") ? "0" : $correct_checkdigit;
            return ($checkdigit == $correct_checkdigit);
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
        return 'Invalid ISBN Number';
    }
}
