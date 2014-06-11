<?php

class LoginController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	protected $layout = 'layouts.master';

	public function get()
	{
		if (Auth::check()) {
		    return Redirect::intended('dashboard');
		}
		else {
			$this->layout->content = View::make('login');
		}
	}
	public function login()
	{
		if(Input::has('email') && Input::has('password')) {
			$email = Input::get('email');
			$password = Input::get('password');
			$rememberme = Input::get('remember', false);
			if (Auth::attempt(array('email' => $email, 'password' => $password), $rememberme))
			{
    			return Redirect::intended('dashboard');
			}
			else {
				$this->layout->content = View::make('login')->with('error', 'Incorrect e-mail address or password');
			}
			
		}
		else {
			$this->layout->content = View::make('login')->with('error', 'You did not specify an e-mail or password');
		}
	}
}
