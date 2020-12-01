<?php


namespace App;


class Helpers
{

    public static function get_pageTitle()
    {
        $routeName = \Illuminate\Support\Facades\Route::currentRouteName();
        $count_dots = substr_count($routeName, '.');
        $routeNameArray = \Illuminate\Support\Str::of($routeName)->explode('.');
        $count = count($routeNameArray);
        $segment = 0;
        if (($count === 4 || $count === 3 || $count === 2) && $count_dots === 2) {
            $segment = 1;
        } elseif ($count === 2 && $count_dots === 1) {
            $segment = 0;
        }
        return $routeNameArray[$segment];
//        return print_r($routeNameArray);
//            return ['$routeNameArray' => $routeNameArray, 'count' => $count];
//        echo 'Route Name Array: ' . $routeNameArray . ' count_dots' . $count_dots . ' Count' . $count;
    }
}
