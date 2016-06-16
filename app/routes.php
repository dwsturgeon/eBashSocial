<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/
Route::get('/',
	[
		'uses' 	=>	'HomeController@getIndex',
		'as'	=>	'home',
	]
);

Route::get('login',
	[
		'uses' 	=>	'HomeController@getLogin',
		'as'	=>	'login',
	]
);

Route::post('login',
	[
		'uses' 	=>	'HomeController@postLogin',
	]
);

Route::get('logout',
	[
		'uses' 	=>	'HomeController@getLogout',
		'as'	=>	'logout',
	]
);

//setup controllers

//Route::controller('/', 'HomeController');
Route::controller('oauth', 'OAuthController');
Route::controller('password', 'RemindersController');
Route::group(
	['before' => 'auth',],
	function () {
	Route::controller('dash', 'DashboardController');
});