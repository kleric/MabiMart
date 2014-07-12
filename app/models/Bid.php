<?php

class Bid extends Eloquent {

	protected $guarded = array('id');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'bids';

	public function getAmount() {
		return number_format($this->amount);
	}

	public function getBidder() {
		$bidder = User::where('id', '=', $this->bidder_id)->first();

		return $bidder->username;
	}
	public function getBidderId() {
		$bidder = User::where('id', '=', $this->bidder_id)->first();

		return $bidder->id;
	}
	public static function getWinningBid($auctionid) 
	{
		
	}
	public static function forUser($userid)
	{
		return Bid::where('bidder_id', '=', $userid)->get();
	}
	public static function getById($id)
	{
		return Bid::where('id', '=', $id)->first();
	}
}
