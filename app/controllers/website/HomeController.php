<?php
namespace website;

use Website;
use Auth;
use Input;
use View;
use Illuminate\Routing\Controllers\Controller;
use Acme\wcsite\home\HomeInterface;

class HomeController extends Controller {

	public function __construct(HomeInterface $homeRespsitroy)
	{
		$this->homeRespsitroy = $homeRespsitroy;
	}

	public function index()
	{
		return View::make('wcsite.index');
	}

	public function saveHome()
	{
		$uid = Auth::user()->id;
		$websiteData = Input::get('data');

		return $this->homeRespsitroy->saveHome($uid,$websiteData);
	}

	public function getData()
	{
		$uid = Auth::user()->id;
		return $this->homeRespsitroy->getHome($uid);
	}
}