<?php

namespace App\Providers;

use App\stripe;
use Illuminate\Support\ServiceProvider;

class Flash extends ServiceProvider
{
    protected $defer = false;

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
       $this->app->singleton(stripe::class,function (){

           return new stripe();

       });

    }


}
