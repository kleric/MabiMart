<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('reviews');

		Schema::create('reviews', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('auction_id')->unsigned();

			$table->foreign('auction_id')->references('id')->on('auctions');

			$table->integer('reviewer_id')->unsigned();
			$table->foreign('reviewer_id')->references('id')->on('users');

			$table->integer('reviewee_id')->unsigned();
			$table->foreign('reviewee_id')->references('id')->on('users');

			$table->tinyinteger('rating'); #how'd they do?
			$table->string('review', 155); #comments

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
		Schema::dropIfExists('reviews');
	}

}
