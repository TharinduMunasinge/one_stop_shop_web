<?php

class CreditFacility extends \Eloquent {
	protected $table='CreditFacility';
	public $primaryKey='CustomerID';
	public $timestamps=false;
	public  $incrementing=false;
	protected $fillable=array('CustomerID','CreditLimit','AvailableCredit','FirstIssue','DuePeriod','ClearCount','TotalPoint');
	
	public function customer()
	{
		# code...

		 return $this->belongsTo('Customer', 'CustomerID');
	}

}