<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('bids');

		Schema::create('bids', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('auction_id')->unsigned();

			$table->foreign('auction_id')->references('id')->on('auctions');

			$table->integer('amount')->unsigned();

			$table->integer('bidder_id')->unsigned();
			$table->foreign('bidder_id')->references('id')->on('users');

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
		Schema::drop('bids');
	}

}
