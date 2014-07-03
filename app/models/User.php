<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	protected $fillable = array('email', 'username', 'password', 'active', 'activation_code');

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function getUnreadInboxCount()
	{
		$count = PM::where('reciever_id', '=', $this->id)->where('read', '=', false)->where('sent', '=', true)->count();
		return $count;
	}
	public function getGravatarUrl()
	{
		$email = trim($this->email);
		$email = strtolower($email);

		$url = 'http://www.gravatar.com/avatar/' . md5($email) . "?r=pg";
		return $url;
	}

	public function getContactDetails()
	{
		return $this->contact_details;
	}
	public function getAboutMe()
	{
		return $this->about_me;
	}
	public function getUsername()
	{
		return $this->username;
	}
	public function getFeedbackInfo()
	{
		$str = "";
	}
}
