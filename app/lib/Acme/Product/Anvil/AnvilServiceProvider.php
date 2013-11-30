<?php namespace Acme\Product\Anvil;

use Illuminate\Support\ServiceProvider;

/**
* 
*/
class AnvilServiceProvider extends ServiceProvider
{
	public function register()
	{
		$app = $this->app;

		$app->bind('Acme\Product\Anvil\AnvilInterface','Acme\Product\Anvil\AnvilHeavy');
	}
}