<?php

class EnchantController extends BaseController {

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

	public function getEnchant($id) 
	{
		$enchant = Enchant::where('id', '=', $id);

		if($enchant->count())
		{
			$enchant = $enchant->first();
			if($enchant->type == 1)
			{
				$auctions = Auction::where('prefix_enchant_id', '=', $id)->where('auctionendtime', '>', time())->orderBy('auctionendtime', 'asc')->get();
			}
			else {
				$auctions = Auction::where('suffix_enchant_id', '=', $id)->where('auctionendtime', '>', time())->orderBy('auctionendtime', 'asc')->get();	
			}


			$this->layout->content = View::make('enchantview', array(
				'enchant' => $enchant,
				'auctions' => $auctions));
		}
	}
	public function getRank($rank) 
	{
		if($rank == 16) {
			$rnk = "All";
			$prefix_list = Enchant::where('type', '=', 1)->orderBy('name', 'asc')->get();
			$suffix_list = Enchant::where('type', '=', 2)->orderBy('name', 'asc')->get();
		
		}
		else {
			$rnk = "Rank " . strtoupper(dechex($rank));
			$prefix_list = Enchant::where('type', '=', 1)->where('rank', '=', $rank)->orderBy('name', 'asc')->get();
			$suffix_list = Enchant::where('type', '=', 2)->where('rank', '=', $rank)->orderBy('name', 'asc')->get();
		
		}

		$this->layout->content = View::make('enchantlist', array(
				'rank' => $rnk,
				'prefix_list' => $prefix_list,
				'suffix_list' => $suffix_list));
	}
	public function getRanks() 
	{
		$this->layout->content = View::make('enchantranklist', array(
			'enchantranks' => range(16, 2)));
	}
}
