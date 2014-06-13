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

Route::get('/', function()
{
	return View::make('welcome');
});
Route::get('/items', array(
	'as' => 'items',
	'uses' => 'ItemController@getItems')
);

Route::get('/item/{id}', array(
	'as' => 'item',
	'uses' => 'ItemController@getItem'));

Route::group(array('before' => 'auth'), function() {
	Route::get('/logout', array(
		'as' => 'logout',
		'uses' => 'AccountController@getLogout')
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