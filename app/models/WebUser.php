<?php

class WebUser extends \Eloquent {
	protected $table='webuser';
	public $primaryKey='username';
	public $timestamps=false;
	public  $incrementing=false;
	protected $fillable=array('username','code','activated','temp_password');

	public function userAccount()
	{
		# code...

		 return $this->hasOne('UserAccount','username','username');
	}
}