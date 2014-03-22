<?php

class LargeOrderCustomer extends \Eloquent {
	protected $table='LargeOrderCustomer';
	public $primaryKey='CustomerID';
	public $timestamps=false;
	public  $incrementing=false;
	protected $fillable=array('CustomerID','CreditLimitAccepted','BRN','SalesRepID');

	public function general()
	{

		return $this->hasOne('Customer','CustomerID','CustomerID');

	}

	public function salesRep()
	{
		return $this->belongsTo('Employee','SalesRepID');
	}

	
}