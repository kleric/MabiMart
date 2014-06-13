<?php

class ItemController extends BaseController {

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

	public function getItem($id) 
	{
		$item = Item::where('id', '=', $id);

		if($item->count())
		{
			$item = $item->first();

			$item_name = $item->getName();
			$description = 	$item->getDescription();

			$this->layout->content = View::make('itemview', array(
				'item_id' => $id,
				'description' => $description,
				'item_name' => $item_name));
		}
	}
	public function getItems() 
	{
		$this->layout->content = View::make('itemlist');
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
			$auth = Auth::attempt(array(
				'email' => Input::get('email'),
				'password' => Input::get('password'),
				'active' => 1)
			);

			if($auth) {
				return Redirect::intended('/');
			}
			else {
				return Redirect::route('login')->withInput()->with('error_message', 'Incorrect credentials or account not activated.');
			}
		}

		return Redirect::route('login')
				->with('error_message', 'There was a problem signing in.');
	}
}
