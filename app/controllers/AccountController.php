<?php

class AccountController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Account Controller
	|--------------------------------------------------------------------------
	|
	*/
	protected $layout = 'layouts.master';
	
	public function getActivate($code) 
	{
		$user = User::where('activation_code', '=', $code)->where('active', '=', '0');

		if($user->count()){
			$user = $user->first();

			$user->active = '1';
			$user->activation_code = '';

			if($user->save()) {
				return Redirect::route('login')->with('success_message', 'Activated! You can sign in now :)');
			}
		}
		return Redirect::route('login')->with('error_message', 'Something went wrong with your activation :(');
	}
	public function postLogin()
	{
		$validator = Validator::make(Input::all(),
			array(
				'email' => 'required|email',
				'password' => 'required'
			)
		);
		if($validator->fails()) {
			return Redirect::route('login')
					->withErrors($validator)
					->withInput();
		}
		else {
			$remember = false || Input::get('remember_me');
			$auth = Auth::attempt(array(
				'email' => Input::get('email'),
				'password' => Input::get('password'), $remember)
			);
			if($auth) {
				if(!Auth::user()->active) {
					Auth::logout();
					return Redirect::route('login')->withInput()->with('error_message', 'Account not activated.');	
				}
				return Redirect::intended('/');
			}
			else {
				return Redirect::route('login')->withInput()->with('error_message', 'Account credentials are incorrect.');
			}
		}

		return Redirect::route('login')
				->with('error_message', 'There was a problem signing in.');
	}

	public function getLogin()
	{
		$this->layout->content = View::make('login');
	}
	public function getLogout()
	{
		Auth::logout();
		return Redirect::route('login')->with('success_message', 'You have successfully signed out.');
	}

	public function getRegistration()
	{
		$this->layout->content = View::make('registration');
	}
	public function postRegistration()
	{
		$validator = Validator::make(Input::all(),
			array(
				'email' => 'required|max:254|email|unique:users',
				'username' => 'required|max:30|alpha_dash|min:3|unique:users',
				'password' => 'required|min:8',
				'confirmpassword' => 'required|same:password'
			)
		);
		if($validator->fails()) {
			return Redirect::route('register')
					->withErrors($validator)
					->withInput();
		}
		else {
			$email    = Input::get('email');
			$username = Input::get('username');
			$password = Input::get('password');

			//Activation code generation
			$activcode = str_random(60);

			$user = User::create(array(
				'email'           => $email,
				'username' 	      => $username,
				'password' 		  => Hash::make($password),
				'active'          => false,
				'activation_code' => $activcode));

			if($user) {

				Mail::send('emails.auth.activate', array('link' => URL::route('activate', $activcode), 'username' => $username), function($message) use ($user) {
					$message->to($user->email, $user->username)->subject('Activate your MabiMart Account');
				});

				return Redirect::to('/')->with('success_message', 'Your account has been created. Please visit your e-mail address and activate it.');

			}
			else {
				Redirect::route('register')
					->withInput();
			}
		}
	}
}
