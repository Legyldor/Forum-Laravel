<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumMpsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('forum_mps', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('mp_expediteur')->unsigned();
            $table->integer('mp_destinataire')->unsigned();
            $table->string('mp_titre', 100);
            $table->string('mp_texte');
            $table->timestamp('mp_time');
            $table->boolean('mp_lu');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('forum_mps');
    }

}
