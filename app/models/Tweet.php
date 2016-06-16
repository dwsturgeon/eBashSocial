<?php

Class Tweet extends Eloquent {
	
	protected $table = 'tweets';
	protected $fillable = array('tweet_id',);

	public function getWebEncodedTweetText($value) {

		$tweetText = $this->tweet_text;

		// See if text filter is enabled
		$dashboardPreferences = DashboardPreferences::find(1);

		if ($dashboardPreferences->filter_enabled) {
			
			$textSearchArr = explode(', ', $dashboardPreferences->filter_search);
			$textReplacementArr = explode(', ', $dashboardPreferences->filter_replace);

			for ($i=0; $i < count($textSearchArr); $i++) { 
				$textSearchArr[$i] = '/ '.$textSearchArr[$i].' /i';	
			}

			for ($i=0; $i < count($textReplacementArr) ; $i++) { 
				$textReplacementArr = ' '.$textReplacementArr[$i].' ';
			}

			$tweetText = preg_replace($textSearchArr, $textReplacementArr, $tweetText);
			//$tweetText = print_r($textSearchArr).print_r($textReplacementArr).$tweetText;
		}


		$tweetText = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2", $tweetText);
		$tweetText = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2", $tweetText);
		$tweetText = preg_replace("/@(\w+)/", "<a href=\"http://www.twitter.com/\\1\" target=\"_blank\">@\\1</a>", $tweetText);
		$tweetText = preg_replace("/#(\w+)/", "<a href=\"http://search.twitter.com/search?q=\\1\" target=\"_blank\">#\\1</a>", $tweetText);

		return $tweetText;
	}

	public function scopeCreatedAtDescending($query)
    {
        return $query->orderBy('tweet_created_at','DESC');
    }
}