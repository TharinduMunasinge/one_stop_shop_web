<?php

class MailOrderCustomer extends \Eloquent {
	protected $table='MailOrderCustomer';
	public $primaryKey='CustomerID';
	public $timestamps=false;
	public  $incrementing=false;
	protected $fillable=array('CustomerID','TRN');

	public function general()
	{

		return $this->hasOne('Customer','CustomerID','CustomerID');

	}

	
}