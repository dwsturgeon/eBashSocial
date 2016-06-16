<?php

class DashboardController extends \BaseController {

	/* 
	 * ----------------------------
	 * getIndex ()
	 * getEditTags ()
	 * postEditTags ()
	 * getEditTextFilter ()
	 * postEditTextFilter ()
	 * -----------------------------
	 */

	public function getIndex () {
		return Redirect::action('DashboardController@getEditTags');
	}

	public function getEditTags () {
		
		$dashboardPreferences = DashboardPreferences::find(1);
		
		return View::make('pages.dashboard.edit-tags',
			[
				'twitterQuery' => $dashboardPreferences->twitter_query,
				'instagramTag' => $dashboardPreferences->instagram_tag,
			]
		);
	}

	public function postEditTags () {
		$twitterQuery = Input::get('twitterQuery');
		$instagramTag = Input::get('instagramTag');

		//remove all white spaces or tabs
		$search = ['/\s+/','/,+/','/,/'];
		$replace = ['',',',', '];
		$instagramTag = preg_replace($search, $replace, $instagramTag);
		$twitterQuery = preg_replace($search, $replace, $twitterQuery);

		$dashboardPreferences = DashboardPreferences::find(1);
		$dashboardPreferences->twitter_query = $twitterQuery;
		$dashboardPreferences->instagram_tag = $instagramTag;
		$dashboardPreferences->save();
		return Redirect::action('DashboardController@getEditTags');
	}

	public function getEditTextFilter () {
		$dashboardPreferences = DashboardPreferences::find(1);
		
		return View::make('pages.dashboard.edit-text-filter',
			[
			'dashboardPreferences' => $dashboardPreferences,
			]
		);
	}

	public function postEditTextFilter () {
		// Get Input from post 
		$textFilterCheckbox = Input::get('text-filter-checkbox');
		$textSearchValues = Input::get('text-search-values-textarea');
		$textReplacementValues = Input::get('text-replacement-values-textarea');

		// Get DashboardPreferences
		$dashboardPreferences = DashboardPreferences::find(1);

		// Text editing
		// Remove spaces from input
		$textSearchValues = preg_replace('/\s+/', '', $textSearchValues);
		$textReplacementValues = preg_replace('/\s+/', '', $textReplacementValues);

		//remove all white spaces or tabs
		$search = ['/\s+/','/,+/','/,/'];
		$replace = ['',',',', '];
		$textSearchValues = preg_replace($search, $replace, $textSearchValues);
		$textReplacementValues = preg_replace($search, $replace, $textReplacementValues);


		$dashboardPreferences->filter_enabled = isset($textFilterCheckbox);
		$dashboardPreferences->filter_search = $textSearchValues;
		$dashboardPreferences->filter_replace = $textReplacementValues;
		$dashboardPreferences->save();

		return Redirect::action('DashboardController@getEditTextFilter');
	}
}