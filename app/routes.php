<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::any('/', function()
{
	return View::make('welcome');
});
Route::any('/items/{category}', array(
	'as' => 'items',
	'uses' => 'ItemController@getCategory')
);
Route::any('/avatar/{userid}', array(
	'as' => 'avatar',
	'uses' => 'ProfileController@getAvatar'));
Route::any('/enchants/{category}', array(
	'as' => 'enchants',
	'uses' => 'EnchantController@getRank'));
Route::any('/items', array(
	'as' => 'categories',
	'uses' => 'ItemController@getCategories')
);
Route::any('/enchants', array(
	'as' => 'enchantlist',
	'uses' => 'EnchantController@getRanks'));

Route::any('/view/{item}', array(
	'as' => 'wikiredirect',
	'uses' => 'ItemController@getWikiPage'));

Route::any('/item/view/{id}', array(
	'as' => 'item',
	'uses' => 'ItemController@getItem'));

Route::any('/enchant/view/{id}', array(
	'as' => 'enchant', 
	'uses' => 'EnchantController@getEnchant'));
	
Route::get('/auction/view/{id}', array(
	'as' => 'auction',
	'uses' => 'AuctionController@getAuction'));

Route::any('/profile/view/{id}', array(
	'as' => 'profile',
	'uses' => 'ProfileController@getProfile'));

Route::any('/auctions', array(
	'as' => 'all-auctions',
	'uses' => 'AuctionController@getAllAuctions'));

Route::any('/auctions/{page}', array(
	'as' => 'auctions',
	'uses' => 'AuctionController@getAllAuctions'));

Route::get('/search/items', array(
	'as' => 'item-search',
	'uses' => 'SearchController@itemSearch'));

Route::post('/search/items', array(
	'as' => 'search-items',
	'uses' => 'SearchController@searchItems'));

Route::group(array('before' => 'auth'), function() {
	Route::group(array('before' => 'csrf'), function() {
		Route::post('/auction/create/{itemid}', array(
			'as' => 'createauction-post',
			'uses' => 'AuctionController@postCreateAuction')
		);
		Route::post('/auction/view/{id}', array(
			'as' => 'auction-post',
			'uses' => 'AuctionController@placeBid'));

		Route::post('/profile/edit', array(
			'as' => 'profile-edit-post',
			'uses' => 'ProfileController@postEditProfile'));

		Route::post('/messages/create/{sendtoid}',
			array(
				'as' => 'send-message',
				'uses' => 'MessageController@sendMessage'));

		Route::post('/review/create/{auctionid}', array(
			'as' => 'post-review',
			'uses' => 'ReviewController@postReview'));
	});
	Route::get('/logout', array(
		'as' => 'logout',
		'uses' => 'AccountController@getLogout')
	);

	Route::get('/review/create/{auctionid}', array(
		'as' => 'create-review',
		'uses' => 'ReviewController@createReview'));

	Route::get('/profile/edit', array(
		'as' => 'profile-edit',
		'uses' => 'ProfileController@getEditProfile')
	);

	Route::get('/messages/inbox', array(
		'as' => 'inbox',
		'uses' => 'MessageController@getInbox')
	);

	Route::get('/messages/reply/{id}', array(
		'as' => 'reply-message',
		'uses' => 'MessageController@replyMessage'));

	Route::get('/messages/create/{userid}',
		array(
			'as' => 'create-message',
			'uses' => 'MessageController@createMessage')
		);

	Route::get('/messages/sent', array(
		'as' => 'sent',
		'uses' => 'MessageController@getSent')
	);

	Route::get('/auction/create/{itemid}', array(
		'as' => 'createauction-get',
		'uses' => 'AuctionController@getCreateAuction')
	);

	Route::get('/messages/view/{msgid}',array(
		'as' => 'view-message',
		'uses' => 'MessageController@viewMessage')
	);

	Route::any('/dashboard', array(
		'as' => 'dashboard',
		'uses' => 'AuctionController@getMyAuctions')
	);
});

Route::group(array('before' => 'guest'), function() {
	//CSRF protection
	Route::group(array('before' => 'csrf'), function() {
		//Registering
		Route::post('/register', array(
			'as' => 'register-post',
			'uses' => 'AccountController@postRegistration')
		);

		//Signing In
		Route::post('/login', array(
			'as' => 'login-post',
			'uses' => 'AccountController@postLogin')
		);
	});

	//Signing In
	Route::get('/login', array(
		'as' => 'login',
		'uses' => 'AccountController@getLogin')
	);

	//Registration
	Route::get('/register', array(
		'as' => 'register',
		'uses' => 'AccountController@getRegistration')
	);

	//Activation
	Route::get('/account/activate/{code}', array(
		'as' => 'activate',
		'uses' => 'AccountController@getActivate')
	);
});
