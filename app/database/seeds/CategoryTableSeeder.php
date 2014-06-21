<?php

class CategoryTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('categories')->delete();
		
		Category::create(array(
			'name' => 'all',
			'description' => 'All of the items!',
			'thumbnail_item_id' => 1,
			'urlname' => 'all'));
	}
}