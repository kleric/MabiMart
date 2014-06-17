<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('auctions', function(Blueprint $table)
		{
			$table->increments('id');

			$table->foreign('item_id')->references('id')->on('items');
			$table->foreign('seller_id')->references('id')->on('users');

			$table->string('description', 500);

			$table->foreign('prefix_enchant_id')->references('id')->on('enchants')->unsigned();
			$table->foreign('suffix_enchant_id')->references('id')->on('enchants')->unsigned();

			$table->foreign('reforge_id')->references('id')->on('reforges');
			$table->smallInteger('reforge_level')->unsigned()->nullable();

			$table->smallInteger('weaponmax')->nullable(); #
			$table->smallInteger('weaponmin')->nullable(); #

			$table->smallInteger('weaponinjurymax')->nullable(); #
			$table->smallinteger('weaponinjurymin')->nullable(); #

			$table->smallInteger('maxdamage')->nullable(); #
			$table->smallInteger('mindamage')->nullable(); #

			$table->smallInteger('magicattack')->nullable(); #

			$table->smallInteger('maxinjury')->nullable(); #
			$table->smallInteger('mininjury')->nullable(); #

			$table->smallInteger('critical')->nullable(); #
			$table->smallInteger('balance')->nullable(); #

			$table->smallInteger('durability')->unsigned()->nullable();
			$table->smallInteger('maxdurability')->unsigned()->nullable(); #

			$table->smallInteger('defense')->nullable(); #
			$table->smallInteger('protection')->nullable(); #
			$table->smallInteger('mdefense')->nullable(); #
			$table->smallInteger('mprotection')->nullable(); #

			$table->smallInteger('luck')->nullable(); #
			$table->smallInteger('int')->nullable(); #
			$table->smallInteger('dex')->nullable(); #
			$table->smallInteger('str')->nullable(); #
			$table->smallInteger('will')->nullable(); #

			$table->smallInteger('hp')->nullable(); #
			$table->smallInteger('sp')->nullable(); #
			$table->smallInteger('mp')->nullable(); #
			$table->smallInteger('cp')->nullable(); #

			$table->smallInteger('pierce')->nullable(); //Armor Piercing (e.g. Lances) #

			$table->smallInteger('upgrades')->unsigned()->nullable();
			$table->smallInteger('gemupgrades')->unsigned()->nullable();

			$table->smallInteger('setexplosion')->unsigned()->nullable(); //#Explosion Defense Set Effect
			$table->smallInteger('setstomp')->unsigned()->nullable(); //#Stomp Resistance Set Effect
			$table->smallInteger('setpoison')->unsigned()->nullable(); //#Poison Resistance Set Effect
			$table->smallInteger('setmpred')->unsigned()->nullable(); //#MP Reduction
			$table->smallInteger('setspred')->unsigned()->nullable(); //#Stamina Reduction
			$table->smallInteger('setattackspeed')->unsigned()->nullable(); //#Attack Speed Boost
			$table->smallInteger('setpetrification')->unsigned()->nullable(); //Petrifcation Resistance
			$table->smallInteger('setflameburst')->unsigned()->nullable(); //Flame Burst
			$table->smallInteger('setwatercannon')->unsigned()->nullable(); //Water Cannon
			$table->smallInteger('setdrain')->unsigned()->nullable(); //Life Drain
			$table->smallInteger('setcharge')->unsigned()->nullable(); //Charge
			$table->smallInteger('setfirebolt')->unsigned()->nullable(); //Firebolt
			$table->smallInteger('seticebolt')->unsigned()->nullable(); //Ice Bolt
			$table->smallInteger('setmagnum')->unsigned()->nullable(); //Magnum
			$table->smallInteger('setsupportshot')->unsigned()->nullable(); //Support Shot
			$table->smallInteger('setquestexp')->unsigned()->nullable(); //Quest Experience (Mysterious Robe)
			$table->smallInteger('setfishing')->unsigned()->nullable(); //Fishing
			$table->smallInteger('settransformation')->unsigned()->nullable(); //Transformation
			$table->smallInteger('setblacksmith')->unsigned()->nullable(); //Blacksmith
			$table->smallInteger('setrefine')->unsigned()->nullable(); //Refining
			$table->smallInteger('setsmash')->unsigned()->nullable(); //Smash
			$table->smallInteger('setassaultslash')->unsigned()->nullable(); //Assault Slash
			$table->smallInteger('setdemigod')->unsigned()->nullable(); //DEMI GOD

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
		Schema::drop('auctions');
	}

}
