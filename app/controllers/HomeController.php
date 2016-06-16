<?php

class HomeController extends \BaseController {

	public function getIndex () {
		
		//Tweet::take(10)->get();
		$tweets = Tweet::createdAtDescending()->take(10)->get();
		$igposts = InstagramPost::createdAtDescending()->take(10)->get();
		
		return View::make('pages.index', 
			[
				'tweets' => $tweets,
				'igposts' => $igposts,
			]
		);
	}

	//login and logout

	public function getLogin () {
		if (Auth::check()) {
			return Redirect::action('DashboardController@getIndex');
		}
		return View::make('pages.login');
	}

	public function postLogin () {
		//get input
		$creds =
		[
			'email'=>Input::get('email'),
			'password'=>Input::get('password'),
		];

		//try to login
		if (Auth::attempt($creds)) {
			return Redirect::action('DashboardController@getIndex');
		}

		//if login fails return to login screen
		return Redirect::action('HomeController@getLogin');
	}

	public function getLogout () {
		Auth::logout();
		return Redirect::action('HomeController@getIndex');
	}
}