<?php
class OAuthController extends \BaseController {


	public function getIndex () {
		return Redirect::action('DashboardController@getIndex');
	}

	public function getLoginWithInstagram () {
		$code = Input::get( 'code' );

    		// get google service
		$instagramService = OAuth::consumer( 'Instagram' );

    		// check if code is valid

    		// if code is provided get user data and sign in
    		if ( !empty( $code ) ) {

	        	// This was a callback request from google, get the token
	        	$token = $instagramService->requestAccessToken( $code );

	        	// Send a request with it
	        	//convert to array
				

	        	$tags = DashboardPreferences::find(1)->instagram_tag;
				$tagsArr= explode(',', $tags);

				foreach ($tagsArr as $key => $value) {
				
					$result = json_decode( $instagramService->request( 'tags/'.$value.'/media/recent'), true );
		        	$data = $result["data"];
		        	
		        	print_r($data[1]);
		        	echo('<br/><br/><br/>');

		        	for ( $i = 0; $i < count($data); $i++ ) {
		        		//print_r($data[$i]);
		        		$igpost = InstagramPost::firstOrNew(["post_id" => $data[$i]["id"]]);

		        		$igpost->post_created_at = $data[$i]["created_time"];
			        	$igpost->username = $data[$i]["user"]["username"];
			        	$igpost->profile_picture = $data[$i]["user"]["profile_picture"];


			        	$igpost->caption_text = $data[$i]["caption"]["text"];

			        	$igpost->media_image_url = $data[$i]["images"]["standard_resolution"]["url"];
			        	$igpost->media_image_thumbnail_url = $data[$i]["images"]["thumbnail"]["url"];
			        	
			        	
			        	$igpost->media_type = $data[$i]["type"];

			        	if($data[$i]["type"] === 'video') {
			        		$igpost->media_video_url = $data[$i]["videos"]["standard_resolution"]["url"];
			        	}

			        	$igpost->save();
			        }
				}



		       return View::make('pages.oauth.instagram');
    		}
    		
    		// if not ask for permission first
    		else {
        		$url = $instagramService->getAuthorizationUri();
        		return Redirect::to( (string)$url );
    		}
  	}

  	public function getLoginWithTwitter () {
  		//Prepare twitter query from db
  		$twitterQuery = DashboardPreferences::find(1)->twitter_query;

  		// setup query
  		$twitterQuery = preg_replace('/,/', ' OR ', $twitterQuery);

  		$notweets = 100;

		$consumerkey = "uE7XKPIhC1Mw6TpiirHTIoH7V";
		$consumersecret = "VjE4ktGImH5YW4VBgTHitrqK8jx653sduHldVZfQufxMvGnHZi";
		$accesstoken = "54129477-9OqK5HTG2S1vVifA3fRixuFH0wAEnZNNajZvW7fVK";
		$accesstokensecret = "VhXoW2BNcRdPlZBxieyeVor208FKH36Yp1jHsnS83T5uI";

		function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
			$connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
			return $connection;
		}
		$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
		
		$results = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=".urlencode($twitterQuery)."&result_type=recent&count=".urlencode($notweets));

		$statuses = $results->statuses;
		
		for ( $i = 0; $i < count($statuses); $i++ ) {

			$original_tweet = $statuses[$i];
			//print_r($original_tweet);
			$tweet = Tweet::firstOrNew(["tweet_id" => $original_tweet->id,]);
			
			$datetime = new DateTime($original_tweet->created_at);
			//$datetime->setTimezone(new DateTimeZone('Europe/Zurich'));
			$tweet->tweet_created_at = $datetime->format('U');
			$tweet->user_id = $original_tweet->user->id;
			$tweet->user_name = $original_tweet->user->name;
			$tweet->user_screen_name = $original_tweet->user->screen_name;

			$profile_image = $original_tweet->user->profile_image_url;
			$profile_image = preg_replace('/_normal(\.[^\.]+)$/', '$1', $profile_image);
			$tweet->profile_image_url = $profile_image;
			echo('<img src="'.$profile_image.'" />');
			$tweet->tweet_text = $original_tweet->text;
			$tweet->rt_count = $original_tweet->retweet_count;
			$tweet->fav_count = $original_tweet->favorite_count;
			echo($original_tweet->text.'<br />');
			if (isset($original_tweet->entities->media)) {
				$tweet->media_url = $original_tweet->entities->media[0]->media_url;
			}

			$tweet->save();
		}
		return View::make('pages.oauth.twitter');
    }

    /*public function getLoginWithTwitterTest () {
    	$consumerkey = "uE7XKPIhC1Mw6TpiirHTIoH7V";
		$consumersecret = "VjE4ktGImH5YW4VBgTHitrqK8jx653sduHldVZfQufxMvGnHZi";
		$accesstoken = "54129477-FnMiJd51TE59cA0uxyWLuzvnPjktIPDg6lR5oPigl";
		$accesstokensecret = "XinVNp628WYs48TY4PUzghRPJXulTKLarLBvgTnToctKi";
		
		$oauth_token = Input::get('oauth_token');
	    $oauth_verifier = Input::get('oauth_verifier');
	    // get service
	    $twitterService = OAuth::consumer('Twitter');
	    // check if code is valid

	    // if code is provided get user data and sign in
	    if (!empty($code)) {

	        // This was a callback request from google, get the token


	        $token = $twitterService->requestAccessToken($oauth_token, $oauth_verifier, $token->getRequestTokenSecret());

	        // Send a request with it
	        $result = json_decode( $twitterService->request( 'account/verify_credentials.json' ), true );

	        echo print_r($result);

	    } else {
	         	// extra request needed for oauth1 to request a request token :-)

        		$token = $twitterService->requestRequestToken();
        		$url = $twitterService->getAuthorizationUri();

        		// return to twitter login url
        		return Redirect::to((string)$url );
	    }
    }*/
}