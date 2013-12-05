<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', 'UserController@dashboard')->before('auth');
Route::get('testioc', 'TestController@index');
Route::get('/wcsite', array('uses' => 'website\HomeController@index'))->before('auth');
Route::post('/wcsite',array('uses' => 'website\HomeController@saveHome'))->before('auth');
Route::get('/wcsite/data', array('uses' => 'website\HomeController@getData'))->before('auth');
Route::get('/register', 'UserController@register')->before('guest');
Route::get('/login', 'UserController@userLogin')->before('guest');
Route::get('/admin/home', 'UserController@index');
Route::get('/dashboard', 'UserController@dashboard')->before('auth');
Route::get('/logout',function ()
{
	Auth::logout();
	return Redirect::to('login');
});

Route::post('/newuser', 'UserController@addUser');
Route::post('/checkUser','UserController@checkUser');
Route::post('upload', 'UploadController@index');
Route::get('/getwc',function ()
{
	$uid = Auth::user()->id;
	$website = Website::where('userid',$uid)->firstOrFail();
	echo $website->homepage;
});
/*
* 重命名路由，以方便在跳转的时候使用路由的名字
$url = URL::route('profile');

$redirect = Redirect::route('profile');
*/
// Route::get('/test/t/s', array('as' => 'f', function ()
// {
// 	return 'just for testing';
// }));

