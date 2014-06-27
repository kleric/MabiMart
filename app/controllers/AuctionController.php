<?php

class AuctionController extends BaseController {

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
	public function postAuction($id)
	{
		$auction = Auction::where('id', '=', $id);
		$minamount;
		if($auction->count()) {
			$auction = $auction->first();
			$all_bids = Bid::where('auction_id', '=', $auction->id)->orderBy('amount', 'desc');
			$leading_bid = ($all_bids->count()) ? $all_bids->first() : null;
			if(!isset($leading_bid)) {
				$minamount = $auction->startingprice;
			}
			else {
				$minamount = $leading_bid->amount;
			}
			$minamount = $minamount + (0.1 * $minamount);
			$validator = Validator::make(
				array(
					'amount' => Input::get('amount'),
					'bidder' => Auth::user()->id
				),
				array(
					'amount' => 'required|numeric|min:' . $minamount,
					'bidder' => ('not_in:' . $auction->seller_id . "," . $leading_bid->getBidderId())
				),
				array(
					'not_in' => "You can't make a bid... ")
			);
			if($validator->fails()) {
				return Redirect::route('auction', $id)
						->withErrors($validator)
						->withInput();
			}
			else if (Auth::check()){
				$amount = Input::get('amount');

				$bid = Bid::create(array(
					'auction_id' => $auction->id,
					'amount' => $amount,
					'bidder_id' => Auth::user()->id));
			}
		}
		$this->getAuction($id);
	}
	public function getAuction($id) 
	{
		$auction = Auction::where('id', '=', $id);

		if($auction->count())
		{
			$auction = $auction->first();
			$all_bids = Bid::where('auction_id', '=', $auction->id)->orderBy('amount', 'desc');
			$leading_bid = ($all_bids->count()) ? $all_bids->first() : null;

			$all_bids = Bid::where('auction_id', '=', $auction->id)->where('id', '<>', $leading_bid->id)->orderBy('amount', 'desc')->get();

			$item_imgurl = "";
			$item_wiki_link = "";
			$item_description = "";
			$item_stats = $auction->getStats();

			$item = Item::where('id', '=', $auction->item_id);

			if($item->count()) {
				$item = $item->first();
				$item_imgurl = $item->imgurl;
				$item_wiki_link = $item->wikilink;
				$item_description = $item->description;
			}
			$user = User::where('id', '=', $auction->seller_id);
			if($user->count()) {
				$user = $user->first();
			}
			$this->layout->content = View::make('auctionview', array(
				'auction_id' => $auction->id,
				'seller_id' => $auction->seller_id,
				'item_id' => $id,
				'item_stats' => $item_stats,
				'item_description' => $item_description,
				'imgurl' => $item_imgurl,
				'auction' => $auction,
				'leading_bid' => $leading_bid,
				'bid_offers' => $all_bids,
				'user_name' => $user->username,
				'wiki_link' => $item_wiki_link,
				'item_name' => $item->name));
		}
	}
	public function postCreateAuction($itemid) 
	{
		$baseitem = Item::where('id', '=', $itemid);

		if($baseitem->count()) 
		{
			$baseitem = $baseitem->first();

			$item_name = $baseitem->getName();
			$item_description = $baseitem->getDescription();

			$this->layout->content = View::make('createauction', array(
				'item_id' => $itemid,
				'item_description' => $item_description,
				'item_name' => $item_name));
		}
	}
	public function getCreateAuction($itemid) 
	{
		$baseitem = Item::where('id', '=', $itemid);

		if($baseitem->count()) 
		{
			$baseitem = $baseitem->first();
			$item_wiki_link = $baseitem->getWikiLink();
			$item_name = $baseitem->getName();
			$item_stats = $baseitem->getStats();
			$item_description = $baseitem->getDescription();
			$item_notes = $baseitem->getNotes();
			$item_imgurl = $baseitem->imgurl;
			$item_is_simple = isset($baseitem->maxdurability) ? null : true;

			$item_damage_range = $baseitem->getDamageRange();
			$item_injury_rate = $baseitem->getInjuryRate();
			$item_proficiency = isset($item_is_simple) ? null : true;

			$args = array(
				'item_id' => $itemid,
				'item_description' => $item_description,
				'item_wiki_link' => $item_wiki_link,
				'item_stats' => $item_stats,
				'item_notes' => $item_notes,
				'item_imgurl' => $item_imgurl,
				'simple' => $item_is_simple,
				'reforgable' => $baseitem->reforgable,
				'enchantable' => $baseitem->enchantable,
				'proficiency' => $item_proficiency,
				'weaponrange' => $item_damage_range,
				'injuryrate' => $item_injury_rate,
				'critical' => $baseitem->critical,
				'balance' => $baseitem->balance,
				'defense' => $baseitem->defense,
				'protection' => $baseitem->protection,
				'mdefense' => $baseitem->mdefense,
				'mprotection' => $baseitem->mprotection,
				'maxdurability' => $baseitem->maxdurability,
				'will' => $baseitem->will,
				'luck' => $baseitem->luck,
				'dex' => $baseitem->dex,
				'str' => $baseitem->str,
				'int' => $baseitem->int,
				'hp' => $baseitem->hp,
				'mp' => $baseitem->mp,
				'sp' => $baseitem->sp,
				'pierce' => $baseitem->pierce,
				'setexplosion' => $baseitem->setexplosion, 
				'setstomp' => $baseitem->setstomp, 
				'setpoison' => $baseitem->setpoison,
				'setmpred' => $baseitem->setmpred, 
				'setspred' => $baseitem->setspred, 
				'setattackspeed' => $baseitem->setattackspeed, 
				'setpetrification' => $baseitem->setpetrification, 
				'setflameburst' => $baseitem->setflameburst, 
				'setwatercannon' => $baseitem->setwatercannon, 

				'setdrain' => $baseitem->setdrain, 
				'setcharge' => $baseitem->setcharge, 
				'setfirebolt' => $baseitem->setfirebolt, 
				'seticebolt' => $baseitem->seticebolt, 
				'setmagnum' => $baseitem->setmagnum, 

				'setsupportshot' => $baseitem->setsupportshot, 
				'setquestexp' => $baseitem->setquestexp, 
				'setfishing' => $baseitem->setfishing, 
				'settransformation' => $baseitem->settransformation, 
				'setblacksmith' => $baseitem->setblacksmith, 

				'setrefine' => $baseitem->setrefine, 
				'setsmash' => $baseitem->setsmash, 
				'setassaultslash' => $baseitem->setassaultslash, 
				'setdemigod' => $baseitem->setdemigod, 
				'item_name' => $item_name);

			$this->layout->content = View::make('createauction', $args);
		}
	}
}
