<?php namespace Acme\Product\Tnt;

use Illuminate\Support\ServiceProvider;

class TntServiceProvider extends ServiceProvider {

    /**
     * Register the binding
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        $app['Tnt'] = function() {
            return new TntHighyield;
        };
    }

}