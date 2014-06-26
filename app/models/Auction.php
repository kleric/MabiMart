<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Auction extends Eloquent {

	protected $guarded = array('id');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'auctions';

	public function getDescription() {
		return $this->description;
	}
		private function statToString($statstring, $stat, $statname, $sign = true, $percent = false) {
		if ($stat === null) return $statstring;

		if ($stat >= 0 && $sign) {
			$statstring = $statstring . "<br>" . $statname . ": +" . $stat; 
		}
		else if ($stat < 0) {
			$statstring = $statstring . "<br>" . $statname . ": -" . $stat;
		}
		else {
			$statstring = $statstring . "<br>" . $statname . ": " . $stat;
		}
		if ($percent) {
			$statstring .= "%";
		}
		return $statstring;
	}
	private function rangeToString($statstring, $statmin, $statmax, $statname, $percentage = false) {
		if ($statmin === null || $statmax == null) return $statstring;

		if(!$percentage)
		{
			$statstring = $statstring . "<br>" . $statname . ": " . $statmin . " ~ " . $statmax;
		}
		else {
			$statstring = $statstring . "<br>" . $statname . ": " . $statmin . "% ~ " . $statmax . "%";
		}
		return $statstring;
	}
	public function getDamageRange() {
		if($this->weaponmax === null || $this->weaponmin === null) return null;

		return $this->weaponmin . " - " . $this->weaponmax;
	}
	public function getInjuryRate() {
		if($this->weaponinjurymin === null || $this->weaponinjurymax === null) return null;

		return $this->weaponinjurymin . " - " . $this->weaponinjurymax; 
	}
	public function getStats() {
		$baseitem = Item::where('id', '=', $this->item_id)->first();

		$stats = "";

		$attackrate = $baseitem->attackrate;
		$numattacks = $baseitem->numattacks;

		if($attackrate !== null && $numattacks !== null) {
			$speed = "";

			switch($attackrate) {
				case 1:
					$speed = "Very Slow";
					break;
				case 2:
					$speed = "Slow";
					break;
				case 3:
					$speed = "Normal";
					break;
				case 4:
					$speed = "Fast";
					break;
				case 5:
					$speed = "Very Fast";
					break;
				default:
					$speed = "Normal";
			}
			$stats = $stats . "<br>" . $speed . " " . $numattacks . " Hit Weapon";
		}

		$stats = $this->rangeToString($stats, $this->weaponmin, $this->weaponmax, "Attack");
		$stats = $this->rangeToString($stats, $this->weaponinjurymin, $this->weaponinjurymax, "Injury", true);

		$stats = $this->statToString($stats, $this->critical, "Critical", false, true);
		$stats = $this->statToString($stats, $this->balance, "Balance", false, true);

		$stats = $this->statToString($stats, $this->magicattack, "Magic Attack");

		$stats = $this->statToString($stats, $this->maxdamage, "Max Damage");
		$stats = $this->statToString($stats, $this->mindamage, "Min Damage");

		$stats = $this->statToString($stats, $this->maxinjury, "Max Injury");
		$stats = $this->statToString($stats, $this->mininjury, "Min Injury");

		$stats = $this->statToString($stats, $this->defense, "Defense");
		$stats = $this->statToString($stats, $this->protection, "Protection");

		$stats = $this->statToString($stats, $this->mdefense, "Magic Defense");
		$stats = $this->statToString($stats, $this->mprotection, "Magic Protection");

		$stats = $this->statToString($stats, $this->luck, "Luck");
		$stats = $this->statToString($stats, $this->int, "Intelligence");
		$stats = $this->statToString($stats, $this->will, "Will");
		$stats = $this->statToString($stats, $this->str, "Strength");
		$stats = $this->statToString($stats, $this->dex, "Dexterity");

		$stats = $this->statToString($stats, $this->hp, "Health");
		$stats = $this->statToString($stats, $this->sp, "Stamina");
		$stats = $this->statToString($stats, $this->mp, "Mana");
		$stats = $this->statToString($stats, $this->cp, "Combat Power");

		$stats = $this->statToString($stats, $this->pierce, "Pierce");

		$stats = $this->statToString($stats, $this->maxdurability, "Durability", false);

		/*$stats = $this->statToString($stats, $this->setexplosion, "Explosion Resistance");
		$stats = $this->statToString($stats, $this->setstomp, "Stomp Resistance");
		$stats = $this->statToString($stats, $this->setpoison, "Poison Resistance");
		$stats = $this->statToString($stats, $this->setmpred, "Mana Usage Reduction");
		$stats = $this->statToString($stats, $this->setspred, "Stamina Usage Reduction");
		$stats = $this->statToString($stats, $this->setattackspeed, "Attack Speed Increase");
		$stats = $this->statToString($stats, $this->setpetrification, "Petrification Resistance");
		$stats = $this->statToString($stats, $this->setflameburst, "Flame Burst Enhancement");
		$stats = $this->statToString($stats, $this->setwatercannon, "Water Cannon Enhancement");

		$stats = $this->statToString($stats, $this->setdrain, "Life Drain Enhancement");
		$stats = $this->statToString($stats, $this->setcharge, "Charge Enhancement");
		$stats = $this->statToString($stats, $this->setfirebolt, "Firebolt Enhancement");
		$stats = $this->statToString($stats, $this->seticebolt, "Icebolt Enhancement");
		$stats = $this->statToString($stats, $this->setmagnum, "Magnum Shot Enhancement");

		$stats = $this->statToString($stats, $this->setsupportshot, "Support Shot Enhancement");
		$stats = $this->statToString($stats, $this->setquestexp, "Quset Experience");
		$stats = $this->statToString($stats, $this->setfishing, "Fishing Enhancement");
		$stats = $this->statToString($stats, $this->settransformation, "Transformation Enhancement");
		$stats = $this->statToString($stats, $this->setblacksmith, "Blacksmithing Enhancement");

		$stats = $this->statToString($stats, $this->setrefine, "Refining Enhancement");
		$stats = $this->statToString($stats, $this->setsmash, "Smash Enhancement");
		$stats = $this->statToString($stats, $this->setassaultslash, "Assault Slash Enhancement");
		$stats = $this->statToString($stats, $this->setdemigod, "Demigod Enhancement");*/


		return $stats;
	}
}
