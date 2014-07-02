<?php

class Review extends Eloquent {

	protected $guarded = array('id');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'reviews';

	public function getReviewer() 
	{
		$user = User::where('id', '=', $this->reviewer_id);

		return $user->first();
	}

	public function getReviewee()
	{
		$user = User::where('id', '=', $this->reviewee_id);

		return $user->first();
	}

	public function getReview()
	{
		$review = $this->review;

		return $review;
	}
	public function getRating()
	{
		$rating = $this->rating;
		
		return $rating;
	}
}
