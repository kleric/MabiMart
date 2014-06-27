<?php

class AuctionTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('auctions')->delete();

		User::create(array(
			'username' => "Rhaenyx"
			));

		
		Auction::create(array(
			'item_id' => 300,
			'seller_id' => 1,
			'description' => "Cool item",
			'weaponmax' => 500,
			'weaponmin' => 200,
			'starting_price' => 400000,
			'prefix_enchant_id' => 2,
			'suffix_enchant_id' => 3
			));
	}
}