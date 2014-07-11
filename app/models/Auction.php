<?php

class Auction extends Eloquent {

	protected $guarded = array('id');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'auctions';

	public static function getById($auctionid) 
	{
		$auctions = Auction::where('id', '=', $auctionid);

		if($auctions->count())
		{
			return $auctions->first();
		}
		return null;
	}
	public function getEndTime() {
		return date_format(new DateTime($this->auctionendtime), 'F jS \a\t g:i:s A');
	}
	public function getStartingPrice() {
		return number_format($this->starting_price);
	}
	public function getUserBid($id)
	{
		$all_bids = Bid::where('auction_id', '=', $this->id)->where('bidder_id', '=', $id)->orderBy('amount', 'desc');
		$leading_bid = ($all_bids->count()) ? $all_bids->first() : null;

		if(isset($leading_bid)) {
			return $leading_bid->getAmount();
		}

		return "";
	}
	private function getEnchantDescription($id) {
		$enchant = Enchant::where('id', '=', $id)->first();

		if(isset($enchant)) {
			$str = "<br/>";

			$str .= $enchant->name;

			return $str;
		}
		return "";
	}
	public function getPrefixDescription() {
		if(isset($this->prefix_enchant_id)) {
			return $this->getEnchantDescription($this->prefix_enchant_id);
		}
		else {
			return "Invalid enchant";
		}
	}
	public function getReforgeRank() {
		return $this->reforgerank;
	}
	public function getReforge($num) {
		$id = null;
		switch($num) {
			case 1:
				$id = $this->reforgeone_id;
				break;
			case 2:
				$id = $this->reforgetwo_id;
				break;
			case 3:
				$id = $this->reforgethree_id;
				break;
			default:
				return "";
		}
		if(!isset($id)) {
			return "";
		}
		$reforge = Reforge::where('id', '=', $id)->first();
		if($num == 3) {
			$str = $reforge->name . " " . $this->reforgeone_level;
		}
		else {
			$str = $reforge->name . " " . $this->reforgeone_level . "<br/>";
		}
		return $str;
	}
	public function getSuffixDescription() {
		if(isset($this->suffix_enchant_id)) {
			return $this->getEnchantDescription($this->suffix_enchant_id);
		}
		else {
			return "Invalid enchant";
		}
	}
	public function getLeadingBid() {
		if(isset($this->leading_bid_id))
		{
			$bid = Bid::where('id', '=', $this->leading_bid_id);
			if($bid->count())
			{
			$bid = Bid::where('id', '=', $this->leading_bid_id)->first();
			return $bid;
			}
			return null;
		}
		return null;
	}
	public function getCurrentOffer() {
		$leading_bid = $this->getLeadingBid();
		if(isset($leading_bid))
		{
			return $leading_bid->getAmount();
		}

		return "";
	}
	public function getCurrentPrice() {
		$leading_bid = $this->getLeadingBid();

		if(isset($leading_bid)) {
			return $leading_bid->getAmount();
		}

		return $this->getStartingPrice();
	}
	public function getAutowinPrice() {
		return ($this->autowin == 0 ? "" : number_format($this->autowin));
	}

	public function getSeller() {
		$user = User::getById($this->seller_id);

		if(isset($user)) {
			return $user->username;
		}

		return "Invalid ID";
	}
	public function getSellerId() {
		$user = User::where('id', '=', $this->seller_id)->first();

		if(isset($user)) {
			return $user->id;
		}

		return 0;
	}
	public function isOver()
	{
		$now = new DateTime('NOW');
		$end = new DateTime($this->auctionendtime);

		if($end < $now) return true;

		return false;
	}
	public function hasWinner() {
		if($this->endtime < (new DateTime('NOW'))){
			$all_bids = Bid::where('auction_id', '=', $this->id)->orderBy('amount', 'desc');
			$leading_bid = ($all_bids->count()) ? $all_bids->first() : null;

			if(isset($leading_bid) && $leading_bid >= $this->minprice) {
				return true;
			}
		}
		return false;
	}
	public function getWinner() {
		if($this->endtime < (new DateTime('NOW'))){
			//$all_bids = Bid::where('auction_id', '=', $this->id)->orderBy('amount', 'desc');
			$leading_user_id = $this->leading_user_id;
			
			if(isset($leading_user_id))
			{
				$usr = User::where('id', '=', $leading_user_id)->first();

				return $usr->getUsername();
			}
		}
		return 1;
	}
	public function getWinnerId() {
		if($this->endtime < (new DateTime('NOW'))){
			//$all_bids = Bid::where('auction_id', '=', $this->id)->orderBy('amount', 'desc');
			$leading_user_id = $this->leading_user_id;
			
			if(isset($leading_user_id))
			{
				return $leading_user_id;
			}
		}
		return 1;
	}
	public function getItemName() {
		$item = Item::where('id', '=', $this->item_id)->first();

		return $item->name;
	}
	public function getDescription() {
		return $this->description;
	}
		private function statToString($statstring, $stat, $statname, $sign = true, $percent = false) {
		if ($stat === null) return $statstring;

		if ($stat >= 0 && $sign) {
			$statstring = $statstring . "<br>" . $statname . ": +" . $stat; 
		}
		else if ($stat < 0) {
			$statstring = $statstring . "<br>" . $statname . ": -" . $stat;
		}
		else {
			$statstring = $statstring . "<br>" . $statname . ": " . $stat;
		}
		if ($percent) {
			$statstring .= "%";
		}
		return $statstring;
	}
	private function rangeToString($statstring, $statmin, $statmax, $statname, $percentage = false) {
		if ($statmin === null || $statmax == null) return $statstring;

		if(!$percentage)
		{
			$statstring = $statstring . "<br>" . $statname . ": " . $statmin . " ~ " . $statmax;
		}
		else {
			$statstring = $statstring . "<br>" . $statname . ": " . $statmin . "% ~ " . $statmax . "%";
		}
		return $statstring;
	}
	public function getDamageRange() {
		if($this->weaponmax === null || $this->weaponmin === null) return null;

		return $this->weaponmin . " - " . $this->weaponmax;
	}
	public function getInjuryRate() {
		if($this->weaponinjurymin === null || $this->weaponinjurymax === null) return null;

		return $this->weaponinjurymin . " - " . $this->weaponinjurymax; 
	}
	public function getStats() {
		$baseitem = Item::where('id', '=', $this->item_id)->first();

		$stats = "";

		$attackrate = $baseitem->attackrate;
		$numattacks = $baseitem->numattacks;

		if($attackrate !== null && $numattacks !== null) {
			$speed = "";

			switch($attackrate) {
				case 1:
					$speed = "Very Slow";
					break;
				case 2:
					$speed = "Slow";
					break;
				case 3:
					$speed = "Normal";
					break;
				case 4:
					$speed = "Fast";
					break;
				case 5:
					$speed = "Very Fast";
					break;
				default:
					$speed = "Normal";
			}
			$stats = $stats . "<br>" . $speed . " " . $numattacks . " Hit Weapon";
		}

		$stats = $this->rangeToString($stats, $this->weaponmin, $this->weaponmax, "Attack");
		$stats = $this->rangeToString($stats, $this->weaponinjurymin, $this->weaponinjurymax, "Injury", true);

		$stats = $this->statToString($stats, $this->critical, "Critical", false, true);
		$stats = $this->statToString($stats, $this->balance, "Balance", false, true);

		$stats = $this->statToString($stats, $this->magicattack, "Magic Attack");

		$stats = $this->statToString($stats, $this->maxdamage, "Max Damage");
		$stats = $this->statToString($stats, $this->mindamage, "Min Damage");

		$stats = $this->statToString($stats, $this->maxinjury, "Max Injury");
		$stats = $this->statToString($stats, $this->mininjury, "Min Injury");

		$stats = $this->statToString($stats, $this->defense, "Defense");
		$stats = $this->statToString($stats, $this->protection, "Protection");

		$stats = $this->statToString($stats, $this->mdefense, "Magic Defense");
		$stats = $this->statToString($stats, $this->mprotection, "Magic Protection");

		$stats = $this->statToString($stats, $this->luck, "Luck");
		$stats = $this->statToString($stats, $this->int, "Intelligence");
		$stats = $this->statToString($stats, $this->will, "Will");
		$stats = $this->statToString($stats, $this->str, "Strength");
		$stats = $this->statToString($stats, $this->dex, "Dexterity");

		$stats = $this->statToString($stats, $this->hp, "Health");
		$stats = $this->statToString($stats, $this->sp, "Stamina");
		$stats = $this->statToString($stats, $this->mp, "Mana");
		$stats = $this->statToString($stats, $this->cp, "Combat Power");

		$stats = $this->statToString($stats, $this->pierce, "Pierce");

		$stats = $this->statToString($stats, $this->maxdurability, "Durability", false);

	    $stats = $this->statToString($stats, $this->setexplosion, "Explosion Resistance");
		$stats = $this->statToString($stats, $this->setstomp, "Stomp Resistance");
		$stats = $this->statToString($stats, $this->setpoison, "Poison Resistance");
		$stats = $this->statToString($stats, $this->setmpred, "Mana Usage Reduction");
		$stats = $this->statToString($stats, $this->setspred, "Stamina Usage Reduction");
		$stats = $this->statToString($stats, $this->setattackspeed, "Attack Speed Increase");
		$stats = $this->statToString($stats, $this->setpetrification, "Petrification Resistance");
		$stats = $this->statToString($stats, $this->setflameburst, "Flame Burst Enhancement");
		$stats = $this->statToString($stats, $this->setwatercannon, "Water Cannon Enhancement");

		$stats = $this->statToString($stats, $this->setdrain, "Life Drain Enhancement");
		$stats = $this->statToString($stats, $this->setcharge, "Charge Enhancement");
		$stats = $this->statToString($stats, $this->setfirebolt, "Firebolt Enhancement");
		$stats = $this->statToString($stats, $this->seticebolt, "Icebolt Enhancement");
		$stats = $this->statToString($stats, $this->setmagnum, "Magnum Shot Enhancement");

		$stats = $this->statToString($stats, $this->setsupportshot, "Support Shot Enhancement");
		$stats = $this->statToString($stats, $this->setquestexp, "Quset Experience");
		$stats = $this->statToString($stats, $this->setfishing, "Fishing Enhancement");
		$stats = $this->statToString($stats, $this->settransformation, "Transformation Enhancement");
		$stats = $this->statToString($stats, $this->setblacksmith, "Blacksmithing Enhancement");

		$stats = $this->statToString($stats, $this->setrefine, "Refining Enhancement");
		$stats = $this->statToString($stats, $this->setsmash, "Smash Enhancement");
		$stats = $this->statToString($stats, $this->setassaultslash, "Assault Slash Enhancement");
		$stats = $this->statToString($stats, $this->setdemigod, "Demigod Enhancement");


		return $stats;
	}
	public static function getAuctionCount() 
	{
		return Auction::where('auctionendtime', '>', new DateTime('NOW'))->count();
	}
	public static function getSellingForUserId($id)
	{
		return Auction::where('auctionendtime', '>', new DateTime('NOW'))->where('seller_id', '=', $id)->orderBy('auctionendtime', 'asc')->get();
	}
	public static function getEndedSoldAuctionsForUserId($id)
	{
		return Auction::where('auctionendtime', '<', new DateTime('NOW'))->where('seller_id', '=', $id)->where('seller_reviewed', '=', false)->get();
	}
	public static function getEndedWonAuctionsForUserId($id)
	{
		return Auction::where('auctionendtime', '<', new DateTime('NOW'))->where('leading_user_id', '=', $id)->where('buyer_reviewed', '=', false)->get();
	}
	public static function getBiddingForUserId($id)
	{
		$user_bids = Bid::forUser($id);

		$auction_ids = array();
		foreach($user_bids as $bid) {
			array_push($auction_ids, $bid->auction_id);
		}
		$auctions_buying = null;
		if(count($auction_ids))
		{
			$auctions_buying = Auction::getAuctionsBiddingOnForUserId($id);
		}
		return $auctions_buying;
	}
}
