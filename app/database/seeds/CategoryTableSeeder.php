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
			'name' => 'All Items',
			'description' => 'Every single one of the items in the MabiMart database. Careful, this may take a while to load as it is loading about 4000 items on the page.',
			'thumbnail_item_id' => 53,
			'urlname' => 'all'));

		Category::create(array(
			'name' => 'Weapons',
			'description' => 'Weapons of all kind! Whether you like to hack-and-slash, snipe with a bow, or cast spells. This is the place to be. (Some weapons here are totally useless)',
			'thumbnail_item_id' => 174,
			'urlname' => 'weapons'));

		Category::create(array(
			'name' => 'Heavy Armors',
			'description' => 'Armor to keep yourself save from even the strongest of attacks! Most of the stuff here will not be very elf friendly though!',
			'thumbnail_item_id' => 1882,
			'urlname' => 'heavyarmors'));

		Category::create(array(
			'name' => 'Light Armors',
			'description' => 'Armor that is more mobile, but a little bit less sturdy.',
			'thumbnail_item_id' => 1238,
			'urlname' => 'lightarmors'));

		Category::create(array(
			'name' => 'Clothing',
			'description' => 'Clothing that is fashionable. Look awesome!',
			'thumbnail_item_id' => 1962,
			'urlname' => 'clothing'));

		Category::create(array(
			'name' => 'Wands and Staffs',
			'description' => 'THE ART OF MAGIKS',
			'thumbnail_item_id' => 1082,
			'urlname' => 'magicweapons'));

		Category::create(array(
			'name' => 'Shields',
			'description' => 'Shields to block enemy attacks with',
			'thumbnail_item_id' => 1970,
			'urlname' => 'shields'));

		Category::create(array(
			'name' => 'Robes and Wings',
			'description' => 'Wear a robe and cover yourself up',
			'thumbnail_item_id' => 278,
			'urlname' => 'robes'));

		Category::create(array(
			'name' => 'Shoes',
			'description' => 'Shoes. They go on your feet.',
			'thumbnail_item_id' => 2488,
			'urlname' => 'shoes'));

		Category::create(array(
			'name' => 'Gloves',
			'description' => 'Gloves, they go on your hands.',
			'thumbnail_item_id' => 2312,
			'urlname' => 'gloves'));

		Category::create(array(
			'name' => 'Hats and Headgear',
			'description' => 'Although this is not TF2, there are hats and you can find them here.',
			'thumbnail_item_id' => 657,
			'urlname' => 'hats'));

		Category::create(array(
			'name' => 'Accessories and Flying Puppets',
			'description' => 'Accessories can all be found here, including balloons and flying puppets!',
			'thumbnail_item_id' => 447,
			'urlname' => 'accessories'));
	}
}