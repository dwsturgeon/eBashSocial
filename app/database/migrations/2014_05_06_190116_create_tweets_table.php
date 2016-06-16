<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTweetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create (
			'tweets',
			function ($t) {
				$t->increments('id');
				$t->integer('tweet_id');
				$t->timestamp('tweet_created_at');

				$t->integer('user_id');
				$t->string('user_name');
				$t->string('user_screen_name');
				$t->string('profile_image_url');

				$t->string('tweet_text');
				$t->integer('rt_count');
				$t->integer('fav_count');

				//$t->string('media_type');
				$t->string('media_url')->nullable();

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
		Schema::dropIfExists('tweets');
	}

}
