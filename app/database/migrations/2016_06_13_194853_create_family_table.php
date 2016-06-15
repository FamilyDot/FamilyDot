<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::create('families', function($table)
    {
      $table->increments('id');
      $table->string('name');
      $table->string('mission_statement')->default('Create an environment where each of us can find support and encouragement in achieving our life’s goals.');
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
    Schema::drop('families');
	}

}
