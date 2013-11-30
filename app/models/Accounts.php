<?php

class Accounts extends Eloquent {

	protected $table = 'accounts';

	public function users()
	{
		$this->belongsTo('User');
	}
}

?>