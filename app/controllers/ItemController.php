<?php

class ItemController extends BaseController {

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
	public function getWikiPage($item) 
	{
		$newurl = "http://wiki.mabinogiworld.com/view/" . $item;
		return Redirect::to($newurl);
	}
	public function getItem($id) 
	{
		$item = Item::where('id', '=', $id);

		if($item->count())
		{
			$item = $item->first();

			$item_name = $item->getName();
			$description = 	$item->getDescription();
			$stats = $item->getStats();
			$wiki_link = $item->getWikiLink();
			$imgurl = $item->imgurl;
			$notes = $item->getNotes();
			
			$imagefilename = $id . ".png";
			$onserverimgurl = "http://mabimart.com/images/items/" . $imagefilename;
			
			//Download it onto the server if it doesn't exist :) so we don't strain wiki servers
			if(@getimagesize($onserverimgurl)) {
				$imgurl = $onserverimgurl;	
			}

			$auctions = Auction::where('item_id', '=', $id)->where('auctionendtime', '>', time())->orderBy('auctionendtime', 'asc')->get();

			$this->layout->content = View::make('itemview', array(
				'item_id' => $id,
				'description' => $description,
				'item_name' => $item_name,
				'item_stats' => $stats,
				'imgurl' => $imgurl,
				'item_notes' => $notes,
				'wiki_link' => $wiki_link,
				'auctions' => $auctions));
		}
	}
	public function getCategory($category) 
	{
		$itemlist;
		$cat = Category::where('urlname', '=', $category)->firstOrFail();
		if($category == "all") {
			$itemlist = Item::all();
		}	
		else {
			$itemlist = $cat->items;
		}
		$this->layout->content = View::make('itemlist', array(
				'itemlist' => $itemlist,
				'category_name' => $cat->name,
				'description' => $cat->description));
	}
	public function getCategories() 
	{
		$this->layout->content = View::make('categorylist', array(
			'categorylist' => Category::all()));
	}
}
