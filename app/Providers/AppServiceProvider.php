<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Apperance;
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
        $app=Apperance::first();
        if(!empty($app)){
        view()->share('siteTitle', $app->name);
        view()->share('sitelogo', $app->logo);
      }
      else{
        view()->share('siteTitle', 'Web Generic');
        view()->share('sitelogo', 'assets/dist/img/AdminLTELogo.png');
      }
    }
}
