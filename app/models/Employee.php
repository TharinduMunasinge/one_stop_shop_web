<?php

class Employee extends \Eloquent {
	protected $table='Employee';
	public $primaryKey='SalesRepID';
	public $timestamps=false;
	public  $incrementing=false;
	protected $fillable=array('SalesRepID','FirstName','LastName');


	public function userAccount()
	{
		# code...
		return $this->hasOne('UserAccount','AccountNumber','SalesRepID');
	}

	public function contacts()
		{
			# code...
			return $this->hasMany('EmployeeContact','ID','SalesRepID');
		}

	public function  companys(){

		return $this->hasMany('LargeOrderCustomer','SalesRepID','SalesRepID');
	}
}