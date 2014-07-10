<?php

class ReviewController extends BaseController {

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

	public function postReview($auctionid)
	{
		$auction = Auction::getById($auctionid);

		if(is_null($auction) || !$auction->hasWinner())
		{
			App::abort(404);
		}

		$seller = User::getById($auction->getSellerId());
		$buyer = User::getById($auction->getWinnerId());

		$user = Auth::user();

		$is_seller = false;

		if($user->id != $seller->id && $user->id != $buyer->id)
		{
			App::abort(404);
		}
		if($user->id == $seller->id)
		{
			$is_seller = true;
			if($auction->seller_reviewed)
			{
				App::abort(404);
			}
		}
		else if ($auction->buyer_reviewed) {
			App::abort(404);
		}

		$validator = Validator::make(Input::all(),
			array(
				'rating' => 'in:-1,0,1|required',
				'review' => 'max:155'));

		if($validator->fails())
		{
			return Redirect::route('create-review')
				->withErrors($validator)
				->withInput();
		}
		$review = array(
			'auction_id' => $auction->id,
			'review' => Input::get('review'),
			'rating' => Input::get('rating'),
			'reviewer_id' => $user->id);

		if($is_seller) {
			$review['reviewee_id'] = $buyer->id;
		}
		else
		{
			$review['reviewee_id'] = $seller->id;
		}
		//try {
    		DB::connection()->getPdo()->beginTransaction();
    		Review::create($review);
    		if($is_seller) {
				$auction->seller_reviewed = true;
			}
			else
			{
				$auction->buyer_reviewed = true;
			}
			$auction->save();
    		DB::connection()->getPdo()->commit();
		//} catch (\PDOException $e) {
    		// Woopsy
    	//	DB::connection()->getPdo()->rollBack();
		//}
		if($is_seller) {
			return Redirect::route('profile', $buyer->id);
		}
		else
		{
			return Redirect::route('profile', $seller->id);
		}
	}
	public function createReview($auctionid)
	{
		$auction = Auction::getById($auctionid);

		if(is_null($auction) || !$auction->hasWinner())
		{
			App::abort(404);
		}

		$seller = User::getById($auction->getSellerId());
		$buyer = User::getById($auction->getWinnerId());

		$user = Auth::user();

		$is_seller = false;

		if($user->id != $seller->id && $user->id != $buyer->id)
		{
			App::abort(404);
		}
		if($user->id == $seller->id)
		{
			$is_seller = true;
			if($auction->seller_reviewed)
			{
				$review = Review::getByAuctionAndReviewerId($auction->id, $user->id);
				//TODO: Redirect to the Review
			}
		}
		else if ($auction->buyer_reviewed) {
			$review = Review::getByAuctionAndReviewerId($auction->id, $user->id);
			//TODO: Redirect to the review
		}
		$params = array(
			'auction' => $auction,
			'is_seller' => $is_seller
			);
		if($is_seller)
		{
			$params['user'] = $buyer;
		}
		else
		{
			$params['user'] = $seller	;
		}
		$this->layout->content = View::make('feedback.createreview', $params);
	}
}
