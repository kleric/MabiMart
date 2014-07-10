<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReviewedColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('auctions', function($table) {
			$table->boolean('seller_reviewed')->default(false);
			$table->boolean('buyer_reviewed')->default(false);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('auctions', function($table) {
			$table->dropColumn('seller_reviewed');
			$table->dropColumn('buyer_reviewed');
		});
	}

}
