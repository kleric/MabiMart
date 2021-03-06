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

		$this->call('ItemTableSeeder');
		$this->command->info('Item Table Seeded');

		$this->call('CategoryTableSeeder');
		$this->command->info('Category table Seeded');

		$this->call('SortedItemTableSeeder');
		$this->command->info('Items now sorted');

		$this->call('EnchantTableSeeder');
		$this->command->info('Enchants now added');

		$this->call('ReforgeTableSeeder');
		$this->command->info('Reforges added');
	}

}
