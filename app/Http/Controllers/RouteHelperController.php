<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteHelperController extends Controller
{
    /**
     * @param $orderedCollection
     * @return array
     */
    public static function getMonths($orderedCollection): array
    {
        $array = array();
        for($i=0; $i<=12; $i++)
        {
            $months = array_keys($orderedCollection);
            if(in_array($i,$months))
            {
                $array[$i] = count($orderedCollection[$i]);
            }
            else{
                $array[$i] = 0;
            }
        }
        array_shift($array);
        return $array;
    }


    public static function getDays($year,$month,$orderedCollection): array
    {
        $array = array();
        $d = cal_days_in_month(CAL_GREGORIAN,$month,$year);

        for($i=1; $i<=$d ; $i++)
        {
            $months = array_keys($orderedCollection);
            if(in_array($i,$months))
            {
                $array[$i] = count($orderedCollection[$i]);
            }
            else{
                $array[$i] = 0;
            }
        }
        array_shift($array);
        return $array;
    }

    /**
     * @param $orderedCollection
     * @return array
     */
    public static function getHours($orderedCollection): array
    {
        $array = array();
        for($i=0; $i<=24; $i++)
        {
            $hours = array_keys($orderedCollection);
            if(in_array($i,$hours))
            {
                $array[$i] = count($orderedCollection[$i]);
            }
            else{
                $array[$i] = 0;
            }
        }
        array_shift($array);
        return $array;
    }


}
