<?php

class ItemTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('items')->delete();

		Item::create(array('name' => 'Cobweb', 'description' => "It is a cobweb"));

		// $this->call('UserTableSeeder');
	}

}
