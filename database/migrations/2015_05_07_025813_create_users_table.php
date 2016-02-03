<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('pseudo', 30);
			$table->string('email', 250)->unique();
			$table->string('password', 60);
                        $table->string('siteweb', 100);
                        $table->string('avatar', 100);
                        $table->string('signature', 200);
                        $table->string('localisation', 100);
                        $table->timestamp('inscrit');
                        $table->timestamp('derniere_visite');
                        $table->integer('rang')->unsigned();
                        $table->integer('post');
			$table->rememberToken();
                        $table->timestamp('delete_at')->nullable();
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
		Schema::drop('users');
	}

}
