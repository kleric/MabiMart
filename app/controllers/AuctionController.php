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
			$invalid_bidders = $auction->seller_id;

			if(isset($leading_bid)) {
				$invalid_bidders .= "," . $leading_bid->getBidderId();
			}
			$minamount = $minamount + (0.1 * $minamount);
			$validator = Validator::make(
				array(
					'amount' => Input::get('amount'),
					'bidder' => Auth::user()->id
					),
				array(
					'amount' => 'required|numeric|min:' . $minamount,
					'bidder' => ('not_in:' . $invalid_bidders)
					),
				array(
					'not_in' => "You can't you're already winning.")
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

			if(isset($leading_bid)) {
				$all_bids = Bid::where('auction_id', '=', $auction->id)->where('id', '<>', $leading_bid->id)->orderBy('amount', 'desc')->take(10)->get();
			}
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
			$imagefilename = $auction->item_id . ".png";
			$onserverimgurl = "http://mabimart.com/images/items/" . $imagefilename;
			
			//Download it onto the server if it doesn't exist :) so we don't strain wiki servers
			if(@getimagesize($onserverimgurl)) {
				$item_imgurl = $onserverimgurl;	
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
				'seller' => $user,
				'leading_bid' => $leading_bid,
				'bid_offers' => $all_bids,
				'user_name' => $user->username,
				'user_id' => $user->id,
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

			$validator = Validator::make(Input::all(),
				array(
					'server' => 'required|in:1,2,3,4',
					'duration' => 'required|in:1,2,3,4,5',
					'quantity' => 'required|max:999|min:1|integer',
					'price' =>'required|min:1000|max:1000000000|integer',
					'autowin' => 'min:1000|max:1000000000|integer',
					'upgrades' => 'min:0|integer',
					'gemupgrades' => 'min:0|integer',
					'critical' => 'min:0|max:1000|integer',
					'balance' => 'min:0|max:100|integer',
					'mattack' => 'integer',
					'defense' => 'integer',
					'protection' => 'integer',
					'luck' => 'integer',
					'str' => 'integer',
					'dex' => 'integer',
					'will' => 'integer',
					'int' => 'integer',
					'hp' => 'integer',
					'mp' => 'integer',
					'sp' => 'integer',
					'pierce' => 'integer',
					'setexplosion' => 'min:0|max:10|integer',
					'setstomp' => 'min:0|max:10|integer',
					'setpoison' => 'min:0|max:10|integer',
					'setmpred' => 'min:0|max:10|integer',
					'setspred' => 'min:0|max:10|integer',
					'setattackspeed' => 'min:0|max:10|integer',
					'setpetrification' => 'min:0|max:10|integer',
					'setflameburst' => 'min:0|max:10|integer',
					'setwatercannon' => 'min:0|max:10|integer',
					'setdrain' => 'min:0|max:10|integer',
					'setcharge' => 'min:0|max:10|integer',
					'setfirebolt' => 'min:0|max:10|integer',
					'seticebolt' => 'min:0|max:10|integer',
					'setmagnum' => 'min:0|max:10|integer',
					'setsupportshot' => 'min:0|max:10|integer',
					'setquestexp' => 'min:0|max:10|integer',
					'setfishing' => 'min:0|max:10|integer',
					'settransformation' => 'min:0|max:10|integer',
					'setblacksmith' => 'min:0|max:10|integer',
					'setrefine' => 'min:0|max:10|integer',
					'setsmash' => 'min:0|max:10|integer',
					'setassaultslash' => 'min:0|max:10|integer',
					'setdemigod' => 'min:0|max:10|integer',
					'proficiency' => 'min:0|max:100',
					'durability' => 'min:0|integer',
					'maxdurability' => 'min:0|integer',
					'reforgerank' => 'in:1,2,3',
					'reforge-1' => 'alphanumeric|max:100',
					'reforge-2' => 'alphanumeric|max:100',
					'reforge-3' => 'alphanumeric|max:100',
					'specialup' => 'size:2',
					'description' => 'max:500'
					));
		$weaponrange = Input::get('weaponrange');
		$injuryrate = Input::get('injuryrate');
		$weaponmax = null;
		$weaponmin = null;
		$injurymax = null;
		$injurymin = null;
		$sniperprotection = Input::get('sniperprotect');

		if(!isset($sniperprotection))
		{
			$sniperprotection = false;
		}

		if(isset($weaponrange)) {
			$weaponrange = preg_split("/[\s-]+/", $weaponrange);
			$weaponmax = $weaponrange[1];
			$weaponmin = $weaponrange[0];
		}
		if(isset($injuryrate)) {
			$injuryrate = preg_split("/[\s-]+/", $injuryrate);
			$injurymax = $injuryrate[1];
			$injurymin = $injuryrate[0];
		}
		$prefix = Input::get('prefix');
		$suffix = Input::get('suffix');
		if(isset($prefix)) {
			if($prefix == -1) {
				$prefix = null;
			}
		}
		if(isset($suffix)) {
			if($suffix == -1) {
				$suffix = null;
			}
		}
		$endtime = new DateTime('NOW');
		$endtime->modify('+' . Input::get('duration') . " day");

		$auction = Auction::create(array(
			'server' => Input::get('server'),
			'auctionendtime' => $endtime,
			'item_id' => $itemid,
			'seller_id' => Auth::user()->id,
			'description' => Input::get('description'),
			'starting_price' => Input::get('price'),
			'autowin' => Input::get('autowin'),
			'minprice' => Input::get('minprice'),
			'sniperprotection' => $sniperprotection,
			'weaponmax' => $weaponmax,
			'weaponmin' => $weaponmin,
			'weaponinjurymax' => $injurymax,
			'weaponinjurymin' => $injurymin,
			'magicattack' => Input::get('mattack'),
			'critical' => Input::get('critical'),
			'balance' => Input::get('balance'),
			'durability' => Input::get('durability'),
			'maxdurability' => Input::get('maxdurability'),
			'defense' => Input::get('defense'),
			'protection' => Input::get('protection'),
			'mdefense' => Input::get('mdefense'),
			'mprotection' => Input::get('mprotection'),
			'luck' => Input::get('luck'),
			'str' => Input::get('str'),
			'will' => Input::get('will'),
			'hp' => Input::get('hp'),
			'mp' => Input::get('mp'),
			'sp' => Input::get('sp'),
			'pierce' => Input::get('pierce'),
			'upgrades' => Input::get('upgrades'),
			'gemupgrades' => Input::get('gemupgrades'),
			'setexplosion' => Input::get('setexplosion'),
			'setstomp' => Input::get('setstomp'),
			'setpoison' => Input::get('setpoison'),
			'setmpred' => Input::get('setmpred'),
			'setspred' => Input::get('setspred'),
			'setexplosion' => Input::get('setexplosion'),
			'setattackspeed' => Input::get('setattackspeed'),
			'setpetrification' => Input::get('setpetrification'),
			'setflameburst' => Input::get('setflameburst'),
			'setwatercannon' => Input::get('setwatercannon'),
			'setdrain' => Input::get('setdrain'),
			'setcharge' => Input::get('setcharge'),
			'setfirebolt' => Input::get('setfirebolt'),
			'seticebolt' => Input::get('seticebolt'),
			'setmagnum' => Input::get('setmagnum'),
			'setsupportshot' => Input::get('setsupportshot'),
			'setquestexp' => Input::get('setquestexp'),
			'setfishing' => Input::get('setfishing'),
			'settransformation' => Input::get('settransformation'),
			'setblacksmith' => Input::get('setblacksmith'),
			'setrefine' => Input::get('setrefine'),
			'setsmash' => Input::get('setsmash'),
			'setassaultslash' => Input::get('setassaultslash'),
			'setdemigod' => Input::get('setdemigod'),
			'reforgelevel' => Input::get('reforgerank'),
			'reforgeone' => Input::get('reforge-1'),
			'reforgetwo' => Input::get('reforge-2'),
			'reforgethree' => Input::get('reforge-3'),
			'prefix_enchant_id' => $prefix,
			'suffix_enchant_id' => $suffix,
			'specialup' => Input::get('specialup')
			));
			if($auction) {
				return Redirect::route('auction', $auction->id)->with('success_message', 'You have successfully created your auction');
			}
			else {

			}
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

			$prefix_enchants = Enchant::where('type', '=', 1)->orderBy('rank', 'desc')->get();
			$suffix_enchants = Enchant::where('type', '=', 2)->orderBy('rank', 'desc')->get();

			$args = array(
				'item_id' => $itemid,
				'item_description' => $item_description,
				'item_wiki_link' => $item_wiki_link,
				'item_stats' => $item_stats,
				'item_notes' => $item_notes,
				'item_imgurl' => $item_imgurl,
				'simple' => $item_is_simple,
				'base_item' => $baseitem,
				'proficiency' => $item_proficiency,
				'weaponrange' => $item_damage_range,
				'injuryrate' => $item_injury_rate,

				'item_name' => $item_name,
				'prefix_enchants' => $prefix_enchants,
				'suffix_enchants' => $suffix_enchants);

			$this->layout->content = View::make('createauction', $args);
		}
	}

	public function getMyAuctions()
	{
		$user = Auth::user();

		$auctions_selling = Auction::where('seller_id', '=', $user->id)->where('auctionendtime', '>', new DateTime('NOW'))->orderBy('auctionendtime', 'asc')->get();

		$user_bids = Bid::where('bidder_id', '=', $user->id)->get();

		$auction_ids = array();
		foreach($user_bids as $bid) {
			array_push($auction_ids, $bid->auction_id);
		}
		$auctions_buying = null;
		if(count($auction_ids))
		{
			$auctions_buying = Auction::where('auctionendtime', '>', new DateTime('NOW'))->whereIn('id', $auction_ids)->get();
		}
		$this->layout->content = View::make('myauctions',
			array(
				'auctions_selling' => $auctions_selling,
				'auctions_buying' => $auctions_buying
			)
		);
	}
	public function getAllAuctions($page = 1)
	{
		$auctions_per_page = 50;
		$lastpage = intval(Auction::getAuctionCount()/$auctions_per_page) + 1;
		if($page <= 0) {
			$page = 1;
		}
		else if($page > $lastpage) {
			$page = $lastpage;
		}
		$all_auctions = Auction::where('auctionendtime', '>', new DateTime('NOW'))
			->orderBy('auctionendtime', 'asc')
			->skip($auctions_per_page * ($page - 1))->take($auctions_per_page)->get();

		$this->layout->content = View::make('allauctions',
			array(
				'page' => $page,
				'lastpage' => $lastpage,
				'all_auctions' => $all_auctions
			)
		);
	}
}
