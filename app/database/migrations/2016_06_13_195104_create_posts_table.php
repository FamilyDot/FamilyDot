<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		  Schema::create('posts', function($table)
      {
          $table->increments('id');
          $table->string('body');
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->integer('family_id')->unsigned();
          $table->foreign('family_id')->references('id')->on('families')->onDelete('cascade');
          $table->string('img_url')->nullable();
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
		  Schema::drop('posts');
	}

}
