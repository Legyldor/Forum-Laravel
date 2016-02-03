<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToAllTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('forum_forums', function(Blueprint $table) {
            //
            $table->foreign('forum_cat_id')
                    ->references('id')
                    ->on('forum_categories')
                    ->onDelete('cascade');

        });

        Schema::table('forum_mps', function(Blueprint $table) {

            $table->foreign('mp_expediteur')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->foreign('mp_destinataire')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
        });
        Schema::table('forum_posts', function(Blueprint $table) {

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->foreign('forum_topic_id')
                    ->references('id')
                    ->on('forum_topics')
                    ->onDelete('cascade');

            $table->foreign('post_forum_id')
                    ->references('id')
                    ->on('forum_forums')
                    ->onDelete('cascade');
        });

        Schema::table('forum_topics', function(Blueprint $table) {

            $table->foreign('forum_id')
                    ->references('id')
                    ->on('forum_forums')
                    ->onDelete('cascade');

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            
            $table->foreign('topic_genre')
                    ->references('id')
                    ->on('forum_genres')
                    ->onDelete('cascade');

        });

        Schema::table('users', function(Blueprint $table) {
            $table->foreign('rang')
                    ->references('id')
                    ->on('forum_rangs')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('forum_forum', function(Blueprint $table) {
            //
        });
    }

}
