<?php

Class InstagramPost extends Eloquent {
	protected $table = 'instagram_posts';
	protected $fillable = array('post_id',);


	public function getWebEncodedCaptionText($value) {
		
		// See if text filter is enabled
		$dashboardPreferences = DashboardPreferences::find(1);
		
		if ($dashboardPreferences->filter_enabled) {

		}

		// Web encode the caption text
		$captionText = $this->caption_text;
		//$captionText = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2", $captionText);
		//$captionText = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2", $captionText);
		$captionText = preg_replace("/@(\w+)/", "<a href=\"http://www.instagram.com/\\1\" target=\"_blank\">@\\1</a>", $captionText);
		//$captionText = preg_replace("/#(\w+)/", "<a href=\"http://search.twitter.com/search?q=\\1\" target=\"_blank\">#\\1</a>", $captionText);

		return $captionText;
	}

	public function scopeCreatedAtDescending($query)
    {
        return $query->orderBy('post_created_at','DESC');
    }
}