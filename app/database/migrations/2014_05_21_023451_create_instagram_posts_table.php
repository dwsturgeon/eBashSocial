<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstagramPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create (
			'instagram_posts',
			function ($t) {
				$t->increments('id');
				$t->integer('post_id');
				$t->timestamp('post_created_at');

				$t->string('username');
				$t->string('profile_picture');

				$t->string('caption_text')->nullable();

				$t->string('media_type');
				$t->string('media_image_thumbnail_url');
				$t->string('media_image_url');
				$t->string('media_video_url')->nullable();

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
		Schema::dropIfExists('instagram_posts');
	}

}
