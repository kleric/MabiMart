<?php

class Reforge extends Eloquent {

	protected $guarded = array('id');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'reforges';

	public static function getAll() 
	{
		$all = Reforge::all();
		return $all;
	}
	public function getName()
	{
		return $this->name;
	}
	public static function exists($id) 
	{
		return (Reforge::where('id', '=', $id)->count() == 0) ? false : true;
	}
}
