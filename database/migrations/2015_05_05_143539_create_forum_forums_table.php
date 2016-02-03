<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumForumsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('forum_forums', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->integer('forum_cat_id')->unsigned();
                        $table->string('forum_name');
                        $table->string('forum_desc');
                        $table->mediumInteger('forum_ordre');
                        $table->integer('forum_last_post_id')->unsigned();
                        $table->mediumInteger('forum_topic');
                        $table->mediumInteger('forum_post');
                        $table->smallInteger('auth_view');
                        $table->smallInteger('auth_post');
                        $table->smallInteger('auth_topic');
                        $table->smallInteger('auth_annonce');
                        $table->smallInteger('auth_modo');
			$table->timestamps();
                        
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('forum_forums');
	}

}
