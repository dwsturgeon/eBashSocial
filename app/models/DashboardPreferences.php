<?php
Class DashboardPreferences extends Eloquent {
	protected $table = 'dashboard_preferences';
	protected $fillable = array('twitter_query','instagram_tag',);
}