<?php

namespace Shahidkarimi\Bizsms;

use Illuminate\Support\ServiceProvider;
use Shahidkarimi\Bizsms\Library\Bizsms;

class BizSmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/bizsms.php', 'bizsms'
        );

        $this->app->bind('bizsms', function ($app) {

            return new Bizsms(config('bizsms'));

        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../Config/bizsms.php' => config_path('bizsms.php'),
        ]);
    }
}
