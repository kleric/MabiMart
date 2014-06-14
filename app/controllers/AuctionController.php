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
		$item = Item::where('id', '=', $id);

		if($item->count())
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
}
