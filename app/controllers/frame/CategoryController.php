<?php
namespace Frame;

use Website;
use Auth;
use Input;
use View;
use Illuminate\Routing\Controllers\Controller;

class CategoryController extends Controller {

	public function __construct()
	{

	}

	public function index()
	{
		return View::make('globalSite.category');
	}
}