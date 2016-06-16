<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardPreferences extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create (
			'dashboard_preferences',
			function ($t) {
				$t->increments('id');
				$t->text('twitter_query');
            	$t->text('instagram_tag');
            	$t->boolean('filter_enabled')->default(FALSE);
            	$t->text('filter_search');
            	$t->text('filter_replace');
				$t->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('dashboard_preferences');
	}

}
