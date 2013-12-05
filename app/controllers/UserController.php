<?php
use Acme\User\UserRepInterface;

class UserController extends BaseController {

	public function __construct(UserRepInterface $userRep)
	{
		$this->userRep = $userRep;
	}

	public function index()
	{
		return View::make('frame');
	}

	public function register()
	{
		$ret = $this->getAction();

		$data = array('currentPage' => $ret	);
		return View::make('globalSite.register')
						->with('data',$data);
	}

	public function dashboard()
	{
		return View::make('globalSite.dashboard')
					->with('data',null);
	}

	public function addUser()
	{
		// Create User
		$user = new User;
		$user->username = Input::get('username');
		$user->email = Input::get('email');
		$user->password =  Hash::make(Input::get('password'));
		$user->qq = Input::get('qq');
		$user->mobile = Input::get('mobile');

		try {
			if($userid = $this->userRep->addUser($user))
			{
				//dd($user);
				// Generate User's Account informations
				$account = new Accounts;
				$account->userid = $userid;
				$account->callbackurl = 'http://wcscm.com/api/xxxx';
				$account->token = 'x320sdf-';

				$account->save();

				Auth::login($user, false);
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
		return $account->toJson();
	}

	public function userLogin()
	{
		$ret = $this->getAction();

		$data = array(
			'currentPage' => $ret
		);

		return View::make('globalSite.login')
					->with('data',$data);	
	}

	public function checkUser()
	{
		$user = array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
		);
		$isAuth = Auth::attempt($user);
		return $isAuth ? 'true' : 'false';
	}

	private function getAction() 
	{
		// Route::getCurrentRoute()->getAction();
		// Route::currentRouteAction();
		// Route::currentRouteName();
		$controlAndAction = Route::getCurrentRoute()->getAction();
		$controlAndAction = explode('@', $controlAndAction)[1];
		return $controlAndAction;
	}
}