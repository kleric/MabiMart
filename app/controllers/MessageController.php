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

	public function replyMessage($id)
	{
		if(Auth::check())
		{
			$message = PM::where('id', '=', $id);

			if($message->count())
			{
				$message = $message->first();

				return Redirect::route('create-message', $message->sender_id)->with('subject', 'RE: ' . $message->subject);
			}
			else
			{
				return Redirect::route('inbox')->with('error_message', "Message with that ID does not exist");
			}
		}
	}
	public function viewMessage($id) 
	{
		if(Auth::check())
		{
			$user = Auth::user();
			$sent_view = null;
			$message = PM::where('id', '=', $id);
			if($message->count())
			{
				$message = $message->first();
				$reciever_name = $message->getRecieverName();
				$sender_name = $message->getSenderName();
				if($user->id == $message->sender_id)
				{
					$sent_view = true;
				}
				else if($user->id != $message->reciever_id)
				{
					return Redirect::route('inbox')->with('error_message', "That message id is invalid");
				}

				$message->read = true;
				$message->save();
				$this->layout->content = View::make('viewmessage', array(
					'sent_view' => $sent_view,
					'subject' => $message->subject,
					'reciever_name' => $reciever_name,
					'sender_name' => $sender_name,
					'sender_id' => $message->sender_id,
					'message_id' => $message->id,
					'state' => 3,
					'content' => $message->content));
			}
			else
			{
				return Redirect::route('inbox')->with('error_message', "Message with that ID does not exist");
			}
		}
	}

	public function createMessage($id)
	{
		if(Auth::check())
		{
			$user = Auth::user();

			$subject = Session::get('subject');

			if($user->id == $id || (User::where('id', '=', $id)->count() != 1))
			{
				return Redirect::route('inbox')->with('error_message', "User with that ID doesn't exist");
			}
			$reciever = User::where('id', '=', $id)->first();

			$this->layout->content = View::make('createmessage', array(
				'state' => 0,
				'subject' => $subject,
				'reciever_name' => $reciever->getUsername()
				));
		}
	}
	public function sendMessage($sendtoid)
	{
		if(Auth::check())
		{
			$user = Auth::user();

			if($user->id == $sendtoid)
			{
				return Redirect::route('inbox')->with('error_message', "You can't message yourself");
			}
			else if(User::where('id', '=', $sendtoid)->count() == 0) 
			{
				return Redirect::route('inbox')->with('error_message', "User wit");
			}
			$validator = Validator::make(Input::all(),array(
				'subject' => 'required|max:70',
				'content' => 'required|max:5000'));

			if($validator->fails()) {
				return Redirect::route('create-message', $sendtoid)
				->withErrors($validator)
				->withInput();
			}
			$subject = Input::get('subject');
			$content = Input::get('content');

			$pm = PM::create(array(
				'subject' => $subject,
				'content' => $content,
				'sender_id' => $user->id,
				'sent' => true,
				'reciever_id' => $sendtoid));

			if($pm) {
				return Redirect::route('inbox')->with('success_message', "Message sent successfully!");
			}
			return Redirect::route('create-message', $itemid)->withInput()->with('error_message', 'Unknown error, failed to send message');

		}
	}

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
