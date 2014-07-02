<?php

class Enchant extends Eloquent {

	protected $guarded = array('id');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'enchants';

	public function getListText() 
	{
		$str = "";

		$str .= $this->name;
		$str .= " - ";
		$str .= "Rank " . strtoupper(dechex($this->rank));
		$type = ($this->rank == 1) ? "Prefix" : "Suffix";
		$str .= " " . $type;

		return $str;
	}
}
