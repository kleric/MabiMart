<?php

class ProfileController extends BaseController {

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

	public function getProfile($id) 
	{
		$user = User::where('id', '=', $id);

		if($user->count())
		{
			$user = $user->first();

			$reviews = Review::where('reviewee_id', '=', $id)->orderBy('updated_at', 'desc')->take(5)->get();

			$this->layout->content = View::make('profileview', array(
				'reviews' => $reviews,
				'user' => $user));
		}
	}
}
