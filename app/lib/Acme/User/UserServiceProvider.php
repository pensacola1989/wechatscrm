<?php namespace Acme\User;

use Illuminate\Support\ServiceProvider;

/**
* 
*/
class UserServiceProvider extends ServiceProvider
{
	public function register()
	{
		$app = $this->app;

		$app->bind('Acme\User\UserRepInterface','Acme\User\UserRepository');
	}
}