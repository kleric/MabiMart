<?php

class PM extends Eloquent {

	protected $guarded = array('id');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pms';

	public function getSenderName()
	{
		$user = User::where('id', '=', $this->sender_id)->first()->username;
		return $user;
	}
	public function getSubject()
	{
		return $this->subject;
	}
	public function getDate()
	{
		return date_format(new DateTime($this->created_at), 'F jS \a\t g:i:s A');
	}
}
