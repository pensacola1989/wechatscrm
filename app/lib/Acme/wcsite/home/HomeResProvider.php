<?php namespace Acme\wcsite\home;

use Illuminate\Support\ServiceProvider;

/**
* 
*/
class HomeResProvider extends ServiceProvider
{
	public function register()
	{
		$app = $this->app;

		$app->bind('Acme\wcsite\home\HomeInterface','Acme\wcsite\home\Home');
	}
}