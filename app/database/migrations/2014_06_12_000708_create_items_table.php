<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('items');

		Schema::create('items', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('name',128);
			$table->string('description', 1024);

			$table->integer('npcvalue')->unsigned()->nullable(); #how much it sells for

			$table->double('stamswing', 4, 2)->nullable();
			$table->double('stuntime', 4, 2)->nullable();

			$table->smallInteger('sdamage')->unsigned()->nullable();
			$table->smallInteger('sangle')->unsigned()->nullable();
			$table->smallInteger('sradius')->unsigned()->nullable();

			$table->string('imgurl', 128);

			$table->boolean('dualwieldable')->nullable();

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

			$table->smallInteger('attackrate')->unsigned()->nullable(); //#Rate of attack, e.g. 1 = Very Slow, 2 = Slow, 3 = Normal, 4 = Fast, 5 = Very Fast
			$table->smallInteger('numattacks')->unsigned()->nullable();

			$table->smallInteger('upgradeclass')->unsigned()->nullable();
			$table->boolean('specialupgradable')->nullable();
			$table->boolean('reforgable')->nullable();
			$table->boolean('enchantable')->nullable();

			$table->boolean('elff')->nullable();
			$table->boolean('humanf')->nullable();
			$table->boolean('giantf')->nullable();

			$table->boolean('elfm')->nullable();
			$table->boolean('humanm')->nullable();
			$table->boolean('giantm')->nullable();

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

			$table->string('notes', 2048)->nullable(); //E.g. part of the nuadha set
			$table->string('wikilink', 256)->nullable();
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
		Schema::dropIfExists('items');
	}

}
