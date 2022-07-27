<?php

namespace App\Providers;

use App\Providers\ShopService\ShopService;
use Illuminate\Support\ServiceProvider;


/**
 * スタッフでログインしている場合に、ショップを選択させたい
 *
 */
class ReonSampleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind('ReonSampleServiceProvider', function(){
            return new ShopService;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
