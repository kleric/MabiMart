<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Item extends Eloquent {

	protected $guarded = array('id');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'items';

	public function getDescription() {
		$description = $this->description;

		if(null === $description) {
			$description = "";
		}
		return $description;
	}
	public function getName() {
		$name = $this->name;

		if(null === $name) {
			$name = 'Item without name';
		}
		return $name;
	}
}
