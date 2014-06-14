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

		Item::create(array(
			'name' => 'Cobweb', 
			'description' => "Dropped by a giant spider, this bundle of cobwebs can be carefully pulled by hand to make thread. You need about 5 bundles to make 1 spool of thread.",
			'wikilink' => "http://wiki.mabinogiworld.com/view/Cobweb",
			'maxdamage' => 5));

		// $this->call('UserTableSeeder');
	}

}
