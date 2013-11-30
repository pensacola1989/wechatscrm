<?php
namespace website;
use View;

use Illuminate\Routing\Controllers\Controller;

class HomeController extends Controller {

	public function index()
	{
		return View::make('wcsite.index');
	}
}