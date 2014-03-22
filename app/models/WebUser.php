<?php

class WebUser extends \Eloquent {
	protected $table='webuser';
	public $primaryKey='UserName';
	public $timestamps=false;
	public  $incrementing=false;
	protected $fillable=array('UserName','code','activated','temp_password');

	public function userAccount()
	{
		# code...

		 return $this->hasOne('UserAccount','UserName','UserName');
	}
}