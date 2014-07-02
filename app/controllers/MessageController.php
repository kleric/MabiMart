<?php

class MessageController extends BaseController {

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

	public function getInbox() 
	{
		if(Auth::check()) {
			$user = Auth::user();
			$messages = PM::where('reciever_id', '=', $user->id)->where('recieverdeleted', '=', false)->orderBy('created_at', 'desc')->get();

			$this->layout->content = View::make('inboxview', array(
				'state' => 1,
				'inbox' => $messages));
		}
	}
	public function getSent()
	{
		if(Auth::check()) {
			$user = Auth::user();
			$messages = PM::where('sender_id', '=', $user->id)->where('senderdeleted', '=', false)->orderBy('created_at', 'desc')->get();

			$this->layout->content = View::make('sentview', array(
				'state' => 2,
				'sent' => $messages));
		}
	}
}
