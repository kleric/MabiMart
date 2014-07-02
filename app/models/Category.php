<?php

class Category extends Eloquent {

	protected $guarded = array('id');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';

	public function items() 
	{
		return $this->morphedByMany('Item', 'sorteditem');
	}
}
