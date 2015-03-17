<?php

class SearchController extends BaseController {

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
	
	public function itemSearch()
	{
		$this->layout->content = View::make('search.itemsearch');
	}
	public function searchItems()
	{
		$searchterm = trim(Input::get('search'));

		if(!isset($searchterm) || empty($searchterm))
		{
			return Redirect::route('item-search')->with('error_message', "You have to search for something");
		}

		$itemlist = Item::where('name', 'LIKE', "%" . $searchterm . "%")->orderBy('name', 'desc')->get();

		$this->layout->content = View::make('search.itemsearchresults', array(
				'itemlist' => $itemlist,
				'search' => $searchterm));

	}
}
