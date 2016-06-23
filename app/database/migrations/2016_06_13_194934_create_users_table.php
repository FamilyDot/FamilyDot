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
    	Schema::create('users', function($table)
        {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('username')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('birth_day')->nullable();
            $table->integer('family_id')->unsigned();
            $table->integer('score')->unsigned();
            $table->foreign('family_id')->references('id')->on('families')->onDelete('cascade');
            $table->string('image_url')->nullable();
            $table->boolean('isAdmin')->default(0);
            $table->string('twitter_username')->nullable();
            $table->rememberToken();
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
