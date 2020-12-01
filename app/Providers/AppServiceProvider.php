<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $counter = 1;
        View::share('counter', $counter);
        Blade::directive('store', function ($expression) {
            return "<?php echo 'welcome to '.$expression ?>";
        });

        Blade::directive('get_pageTitle', function ($routeName) {
            $routeName = Route::currentRouteName();
            $count_dots = substr_count($routeName, '.');
            $routeNameArray = \Illuminate\Support\Str::of($routeName)->explode('.');
            $count = count($routeNameArray);
            $segment = 0;
            if (($count === 4 || $count === 3 || $count === 2) && $count_dots === 2) {
                $segment = 1;
            } elseif ($count === 2 && $count_dots === 1) {
                $segment = 0;
            }
//            View::share('routeName',$routeNameArray[$segment]);
            /*            return "<?php echo {$routeNameArray[$segment]} ?>";*/
//            return $routeNameArray[$segment];
            /*            return "<?php echo 'welcome to '.$count ?>";*/
//            return $routeNameArray[$segment];
//            dd($routeNameArray,$routeNameArray[$segment]);
//            return $routeNameArray[$segment];
//            dd($routeNameArray[$segment]);
//            echo $routeNameArray[$segment];
        });
    }
}
