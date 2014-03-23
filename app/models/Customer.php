<?php

class Customer extends \Eloquent {
	protected $table='Customer';
	public $primaryKey='CustomerID';
	public $timestamps=false;
	public  $incrementing=false;
	protected $fillable=array('FirstName','LastName','AddressCity','AddressStreet','AddressNumber','Email','CustomerType');
	

	public function creditFacility()
	{

		return $this->hasOne('CreditFacility','CustomerID','CustomerID');
	}
	
	public function userAccount()
	{
		# code...
		return $this->hasOne('UserAccount','AccountNumber','CustomerID')->where('AccountType','CU');
	}

	public function user()
	{
		# code...
		return $this->hasOne('User','AccountNumber','CustomerID')->where('AccountType','CU');
	}

	public function contact()
	{
		# code...
		return $this->hasMany('CustomerContact','ID','CustomerID');
	}

	public function order()
	{
		return $this->hasMany('Order','CustomerID','CustomerID');
	}
	

	public function mailOrderCustomer()
	{

		return $this->hasOne('MailOrderCustomer','CustomerID','CustomerID');

	}

	public function largeOrderCustomer()
	{

		return $this->hasOne('LargeOrderCustomer','CustomerID','CustomerID');
		
	}

	public function walkInVipOrderCustomer()
	{

		return $this->hasOne('LargeOrderCustomer','CustomerID','CustomerID');
		
	}

	public function specific()
	{

		if($this->CustomerType=='M')
				return $this->mailOrderCustomer();

		if($this->CustomerType=='L')
				return $this->largeOrderCustomer();

		if($this->CustomerType=='W')
				return $this->walkInVipOrderCustomer();
		
		return "hello";
	}



}