<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

    $this->call('FamiliesTableSeeder');
  //   $this->call('UserTableSeeder');
  //   $this->call('QuestionsTableSeeder');
  //   $this->call('PostsTableSeeder');
		// $this->call('AnswersTableSeeder');
	}

}
