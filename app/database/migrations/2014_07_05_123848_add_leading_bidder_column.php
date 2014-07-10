<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLeadingBidderColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('auctions', function($table) {
			if(Schema::hasColumn('auctions', 'leading_user_id'))
			{
				$table->dropColumn('leading_user_id');
			}
			$table->integer('leading_user_id')->unsigned()->nullable();
			$table->foreign('leading_user_id')->references('id')->on('users');

			if(Schema::hasColumn('auctions', 'leading_bid_id'))
			{
				$table->dropColumn('leading_bid_id');
			}
			//$table->dropColumn('leading_bid_id');
			$table->integer('leading_bid_id')->unsigned()->nullable();
			$table->foreign('leading_bid_id')->references('id')->on('bids');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('auctions', function($table) 
		{
			$table->dropForeign('auctions_leading_user_id_foreign');
			$table->dropColumn('leading_user_id');

			$table->dropForeign('auctions_leading_bid_id_foreign');
			$table->dropColumn('leading_bid_id');
		});
	}

}
