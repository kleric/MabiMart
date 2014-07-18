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

	public function getProfilePictureUrl()
	{

		$url = "images/avatar/" . $this->id . "/" . $this->pic_id . ".png";

		if(!(@getimagesize($url))) {
			$url = URL::to('images/avatar/blank.png');
		}
		return "/" . $url;

	}
	public function getProfilePictureSmallUrl()
	{
		$url = "images/avatar/" . $this->id . "/" . $this->pic_id . ".small.png";

		if(!(@getimagesize($url))) {
			$url = URL::to('images/avatar/blank_small.png');
		}
		return "/" . $url;
	}

	public function getContactDetails()
	{
		return Purifier::clean($this->contact_details);
	}
	public function getAboutMe()
	{
		return Purifier::clean($this->about_me, array(
            		'AutoFormat.AutoParagraph' => false,
            		'AutoFormat.Linkify' => false,
        	));
	}
	public function getUsername()
	{
		return $this->username;
	}
	public function getFeedbackInfo()
	{
		$str = "";
	}
	public function getFeedbackScore() 
	{
		return $this->getPositiveCount() + $this->getNegativeCount();
	}
	public function getPositiveCount() 
	{
		$positive = Review::where('reviewee_id', '=', $this->id)->where('rating', '>', 0)->count();
		return $positive;
	}
	public function getNegativeCount() 
	{
		$positive = Review::where('reviewee_id', '=', $this->id)->where('rating', '<', 0)->count();
		return $positive;
	}
	public function getNeutralCount() 
	{
		$positive = Review::where('reviewee_id', '=', $this->id)->where('rating', '=', 0)->count();
		return $positive;
	}

	public static function getById($id)
	{
		$user = User::where('id', '=', $id);

		if($user->count()) {
			return $user->first();
		}

		return null;
	}
}
