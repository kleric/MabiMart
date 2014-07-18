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
		$contact_details = (Input::old('contact_details') !== null) ? Input::old('contact_details') : $user->contact_details;
		$about = (Input::old('about_you') !== null) ? Input::old('about_you') : $user->about_me;
		$this->layout->content = View::make('profileedit', array(
			'contact' => $contact_details,
			'profile_pic_url' => $profile_pic_url,
			'about' => $about));
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
			try {
    			DB::connection()->getPdo()->beginTransaction();
				$user->contact_details = Input::get('contact_details');
				$user->about_me = Input::get('about_you');
				$user->pic_id = $user->pic_id + 1;
				$src_url = 'images/avatar/' . $user->id . "/";
				if(isset($pic)) {
					$pic->move($src_url, $user->pic_id . '_original.png');
				

					$extension = strtolower(strrchr($pic->getClientOriginalName(), '.'));
					$img = false;
    				switch ($extension) {
        				case '.jpg':
        				case '.jpeg':
            				$img = @imagecreatefromjpeg($src_url . $user->pic_id . '_original.png');
            				break;
        				case '.gif':
            				$img = @imagecreatefromgif($src_url . $user->pic_id . '_original.png');
            				break;
        				case '.png':
            				$img = @imagecreatefrompng($src_url . $user->pic_id . '_original.png');
            				break;
        				default:
        					$img = false;
            				break;
    				}
    				if(($img)) {
    					function scale($image, $dim)
	{
    	$w = $dim;
    	$h = $dim;
    	$newimage = imagecreatetruecolor($w, $h);
    	imagecopyresized($newimage, $image, 0, 0, 0, 0, $w, $h,
                                                   imagesx($image), imagesy($image));
    	return $newimage;
	}
    					$small_img = scale($img, 50);
						$normal_img = scale($img, 100);

						imagepng ($small_img, $src_url . $user->pic_id . '.small.png');
						imagepng ($normal_img, $src_url . $user->pic_id . '.png');
    				}
    				else {
    					File::delete($src_url . $user->pic_id . '_original.png');
    					return Redirect::route('profile-edit', $user->id)->with('error_message', 'Image invalid')->withInput();
    				}
    			}
				//$img = imagecreatefrompng($src_url . $user->pic_id . '_original.png');

				$user->save();
				DB::connection()->getPdo()->commit();
			}
 			catch (\PDOException $e) {
    			// Woopsy
    			DB::connection()->getPdo()->rollBack();
			}
			return Redirect::route('profile', $user->id)->with('success_message', 'Changes saved successfully :)');
		}
	}
}
