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
			
			$imagefilename = $id . ".png";
			$onserverimgurl = "http://mabimart.com/images/items/" . $imagefilename;
			
			//Download it onto the server if it doesn't exist :) so we don't strain wiki servers
			if(@getimagesize($onserverimgurl)) {
				$imgurl = $onserverimgurl;	
			}

			$this->layout->content = View::make('itemview', array(
				'item_id' => $id,
				'description' => $description,
				'item_name' => $item_name,
				'item_stats' => $stats,
				'imgurl' => $imgurl,
				'wiki_link' => $wiki_link));
		}
	}
	public function getItems() 
	{
		$this->layout->content = View::make('itemlist');
	}
}
