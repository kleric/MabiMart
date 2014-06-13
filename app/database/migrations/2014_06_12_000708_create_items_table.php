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
		Schema::create('items', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('name',128);
			$table->string('description', 1024);

			$table->smallInteger('maxdamage')->nullable();
			$table->smallInteger('mindamage')->nullable();

			$table->smallInteger('magicattack')->nullable();

			$table->smallInteger('maxinjury')->nullable();
			$table->smallInteger('mininjury')->nullable();

			$table->smallInteger('critical')->nullable();
			$table->smallInteger('balance')->nullable();

			$table->smallInteger('maxdurability')->unsigned()->nullable();

			$table->smallInteger('defense')->nullable();
			$table->smallInteger('protection')->nullable();
			$table->smallInteger('mdefense')->nullable();
			$table->smallInteger('mprotection')->nullable();

			$table->smallInteger('luck')->nullable();
			$table->smallInteger('int')->nullable();
			$table->smallInteger('dex')->nullable();
			$table->smallInteger('str')->nullable();
			$table->smallInteger('will')->nullable();

			$table->smallInteger('hp')->nullable();
			$table->smallInteger('sp')->nullable();
			$table->smallInteger('mp')->nullable();
			$table->smallInteger('cp')->nullable();

			$table->smallInteger('pierce')->nullable(); //Armor Piercing (e.g. Lances)

			$table->decimal('size',4,2);
			$table->smallInteger('attackrate')->unsigned()->nullable(); //Rate of attack, e.g. 1 = Very Slow, 2 = Slow, 3 = Normal, 4 = Fast, 5 = Very Fast

			$table->smallInteger('setexplosion')->unsigned()->nullable(); //Explosion Defense Set Effect
			$table->smallInteger('setstomp')->unsigned()->nullable(); //Stomp Resistance Set Effect
			$table->smallInteger('setpoison')->unsigned()->nullable(); //Poison Resistance Set Effect
			$table->smallInteger('setmpred')->unsigned()->nullable(); //MP Reduction
			$table->smallInteger('setspred')->unsigned()->nullable(); //Stamina Reduction
			$table->smallInteger('setattackspeed')->unsigned()->nullable(); //Attack Speed Boost
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

			$table->string('notes', 256)->nullable(); //E.g. part of the nuadha set

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
		Schema::drop('items');
	}

}
