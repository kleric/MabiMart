<?php

class ProfileController extends BaseController {

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

	public function getProfile($id) 
	{
		$user = User::where('id', '=', $id);

		if($user->count())
		{
			$user = $user->first();

			$reviews = Review::where('reviewee_id', '=', $id)->orderBy('updated_at', 'desc')->take(5)->get();
			$auctions = Auction::getSellingForUserId($user->id);
			$this->layout->content = View::make('profileview', array(
				'reviews' => $reviews,
				'auctions_selling' => $auctions,
				'user' => $user));
		}
	}
	public function getAvatar($userid) 
	{

	}
	public function getEditProfile() {
		$user = User::where('id', '=', Auth::user()->id)->first();

		$profile_pic_url = $user->getProfilePictureUrl();

		$this->layout->content = View::make('profileedit', array(
			'contact' => $user->contact_details,
			'profile_pic_url' => $profile_pic_url,
			'about' => $user->about_me));
	}
	public function postEditProfile() {
		if(Auth::check()) {
			$user = User::where('id', '=', Auth::user()->id)->first();
			$validator = Validator::make(Input::all(),
				array(
					'contact_details' => 'required|max:1000',
					'about_you' => 'max:1000'
				)
			);
			if($validator->fails()) {
				return Redirect::route('profile-edit')
						->withErrors($validator)
						->withInput();
			}	
			$pic = Input::file('profilepic');
			$validator = Validator::make(array('image' => $pic),
				array(
					'image' => 'image|max:1024'));

			if($validator->fails()) {
				return Redirect::route('profile-edit')
						->withErrors($validator)
						->withInput();
			}

			$user->contact_details = Input::get('contact_details');
			$user->about_me = Input::get('about_you');

			$src_url = 'images/avatar/' . $user->id . '.png';

			$pic->move($src_url);

			$img = imagecreatefrompng($src_url);
			$small_img = imagescale ($img, 50, 50);

			imagepng ($small_img, 'images/avatar/' . $user->id . '_small.png');

			$user->save();

			return Redirect::route('profile', $user->id)->with('success_message', 'Changes saved successfully :)');
		}
	}
}
