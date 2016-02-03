<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumTopicsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('forum_topics', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->integer('forum_id')->unsigned();
                        $table->string('topic_titre', 60);
                        $table->integer('user_id')->unsigned();
                        $table->mediumInteger('topic_vu');
                        $table->integer('topic_genre')->unsigned();
                        $table->integer('topic_last_post')->unsigned();
                        $table->integer('topic_first_post')->unsigned();
                        $table->mediumInteger('topic_post');
                        $table->boolean('topic_locked');
			$table->timestamps();
                        $table->unique('topic_last_post', 'topic_last_post');
                        
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('forum_topics');
	}

}
