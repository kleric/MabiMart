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
	public static function getByAuctionAndReviewerId($id, $writerid)
	{
		$reviews = Review::where('auction_id', '=', $id)->where('reviewer_id', '=', $writerid);

		if($reviews->count())
		{
			$review = $reviews->first();

			return $review;
		}
		return null;
	}
}
