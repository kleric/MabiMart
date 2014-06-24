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

	public function getAuction($id) 
	{
		$auction = Auction::where('id', '=', $id);

		if($auction->count())
		{
			$item = $item->first();

			$item_name = $item->getName();
			$description = 	$item->getDescription();

			$this->layout->content = View::make('auctionview', array(
				'item_id' => $id,
				'description' => $description,
				'item_name' => $item_name));
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
			
			$args = array(
				'item_id' => $itemid,
				'item_description' => $item_description,
				'item_wiki_link' => $item_wiki_link,
				'item_stats' => $item_stats,
				'item_notes' => $item_notes,
				'item_imgurl' => $item_imgurl,
				'item_name' => $item_name);

			$this->layout->content = View::make('createauction', $args);
		}
	}
}
