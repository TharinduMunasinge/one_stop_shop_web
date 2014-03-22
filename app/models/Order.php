<?php

class Order extends \Eloquent {
	protected $table='Order';
	public $primaryKey='OrderNumber';
	public $timestamps=false;
	public  $incrementing=false;
	protected $fillable=array('OrderNumber','CustomerID','Proceesed','DateCreated');

	public function orderItem()
	{
		# code...

		 return $this->hasMany('OrderItem', 'OrderNumber','OrderNumber');
	}

	public function customer()
	{
		# code...

		 return $this->belongsTo('Customer', 'CustomerID','CustomerID');
	}
}