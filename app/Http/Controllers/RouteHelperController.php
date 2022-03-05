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
}
