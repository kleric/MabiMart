<?php

class AuctionController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	*/
	protected $layout = 'layouts.master';

	/*
	| placeBid($auctionid)
	|
	| Places the bid for the selected auction.
	*/
	public function placeBid($id)
	{
		$auction = Auction::where('id', '=', $id);
		$user = Auth::user();

		if($auction->count()) {
			$auction = $auction->first();

			if($auction->isOver())
			{
				return Redirect::route('auction', $id)->with('error_message', "This auction has already ended...");
			}
			$all_bids = Bid::where('auction_id', '=', $auction->id)->orderBy('amount', 'desc');

			try {
    			DB::connection()->getPdo()->beginTransaction();
      			$leading_bid = $auction->getLeadingBid();

      			$minamount;
      			if(!isset($leading_bid)) {
					$minamount = $auction->starting_price;

				}
				else {
					$minamount = $leading_bid->amount;

					if($minamount < 1000)
					{
						$minamount = $auction->starting_price;
					}
					$minamount = intval($minamount + ($minamount * 0.1));
				}
				$invalid_bidders = $auction->seller_id;	

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
						'not_in' => "You can't bid on your own item.")
					);
				if($validator->fails()) {
					return Redirect::route('auction', $id)
					->withErrors($validator)
					->withInput();
				}
				else if (Auth::check()){
					$amount = Input::get('amount');			

					if($amount >= $auction->autowin && $auction->autowin >= 1000) {
						$amount = $auction->autowin;
						$new_end_time = new DateTime('NOW');
						$new_end_time->modify('-' . 2 . " second");
						$auction->auctionendtime = $new_end_time;
					}

					$bid = Bid::create(array(
						'auction_id' => $auction->id,
						'amount' => $amount,
						'bidder_id' => $user->id));

					if($bid) {
						$auction->leading_bid_id = $bid->id;
						$auction->leading_user_id = $bid->bidder_id;
						$auction->save();

						 DB::connection()->getPdo()->commit();
					}
				}
 			}
 			catch (\PDOException $e) {
    			// Woopsy
    			DB::connection()->getPdo()->rollBack();
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
			$reforged = false;
			if(isset($auction->reforgeone_id) || isset($auction->reforgetwo_id) || isset($auction->reforgethree_id)) {
				$reforged = true;
			}
			$item = Item::where('id', '=', $auction->item_id);

			if($item->count()) {
				$item = $item->first();
				$item_imgurl = $item->imgurl;
				$item_wiki_link = $item->wikilink;
				$item_description = $item->description;
			}
			$imagefilename = $auction->item_id . ".png";
			$onserverimgurl = "http://mabimart.com/images/items/" . $imagefilename;
			
			//Use our image, since we have it.
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
				'reforged' => $reforged,
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
					'duration' => 'required|in:1,2,3,4,5,10',
					'minprice' => 'min:1000|integer',
					'quantity' => 'sometimes|required|max:999|min:1|integer',
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
					'reforge-1-level' => 'integer|max:25',
					'reforge-2-level' => 'integer|max:25',
					'reforge-3-level' => 'integer|max:25',
					'specialup' => 'size:2',
					'description' => 'max:500'
					));

		if($validator->fails()) {
				return Redirect::route('createauction-get', $itemid)
				->withErrors($validator)
				->withInput();
			}

		$autowin = Input::get('autowin');
		$minprice = Input::get('minprice');
		$starting_price = Input::get('price');

		if(isset($autowin) && isset($minprice) && $minprice > $autowin)
		{
			return Redirect::route('createauction-get', $itemid)
			->withInput()->with('error_message', 'Your min price is greater than your autowin.');
		}
		else if((isset($autowin) || isset($minprice)) && ($starting_price > $autowin || $starting_price > $min_price))
		{
			return Redirect::route('createauction-get', $itemid)
			->withInput()->with('error_message', 'Your starting price is too high.');
		}




		$weaponrange = Input::get('weaponrange');
		$injuryrate = Input::get('injuryrate');
		$weaponmax = null;
		$weaponmin = null;
		$injurymax = null;
		$injurymin = null;
		$sniperprotection = Input::get('sniperprotect');
		$quantity = Input::get('quantity');

		if(!isset($quantity)) {
			$quantity = 1;
		}

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
			if(!Enchant::exists($prefix))
			{
				$prefix = null;
			}
		}
		if(isset($suffix)) {
			if(!Enchant::exists($suffix))
			{
				$suffix = null;
			}
		}
		$reforge_1 = Input::get('reforge-1');
		$reforge_2 = Input::get('reforge-2');
		$reforge_3 = Input::get('reforge-3');

		$reforge_1_level = Input::get('reforge-1-level');
		$reforge_2_level = Input::get('reforge-2-level');
		$reforge_3_level = Input::get('reforge-3-level');

		if(isset($reforge_1)) {
			if(!Reforge::exists($reforge_1))
			{
				$reforge_1 = null;
				$reforge_1_level = null;
			}
		}
		if(isset($reforge_2)) {
			if(!Reforge::exists($reforge_2))
			{
				$reforge_2 = null;
				$reforge_2_level = null;
			}
		}
		if(isset($reforge_3)) {
			if(!Reforge::exists($reforge_3))
			{
				$reforge_3 = null;
				$reforge_3_level = null;
			}
		}

		$endtime = new DateTime('NOW');
		$endtime->modify('+' . Input::get('duration') . " day");

		$auction = Auction::create(array(
			'server' => Input::get('server'),
			'auctionendtime' => $endtime,
			'item_id' => $itemid,
			'quantity' => $quantity,
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
			'reforgerank' => Input::get('reforgerank'),
			'reforgeone_id' => $reforge_1,
			'reforgetwo_id' => $reforge_2,
			'reforgethree_id' => $reforge_3,
			'reforgeone_level' => $reforge_1_level,
			'reforgetwo_level' => $reforge_2_level,
			'reforgethree_level' => $reforge_3_level,
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

			$reforges = null;
			if(isset($baseitem->reforgable)) {
				$reforges = Reforge::getAll();
			}

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
				'reforges' => $reforges,
				'item_name' => $item_name,
				'prefix_enchants' => $prefix_enchants,
				'suffix_enchants' => $suffix_enchants);

			$this->layout->content = View::make('createauction', $args);
		}
	}

	public function getMyAuctions()
	{
		$user = Auth::user();

		$auctions_selling = Auction::getSellingForUserId($user->id);
		$auctions_buying = Auction::getBiddingForUserId($user->id);

		$auctions_ended = null;

		$auctions_ended_seller = Auction::getEndedSoldAuctionsForUserId($user->id);
		$auctions_ended_buyer = Auction::getEndedWonAuctionsForUserId($user->id);

		$auctions_ended = $auctions_ended_seller->merge($auctions_ended_buyer);

		$this->layout->content = View::make('myauctions',
			array(
				'auctions_selling' => $auctions_selling,
				'auctions_buying' => $auctions_buying,
				'auctions_ended' => $auctions_ended
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
