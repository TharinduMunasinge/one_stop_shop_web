<?php

class Order extends \Eloquent {
	protected $table='Order';
	public $primaryKey='OrderNumber';
	public $timestamps=false;
	public  $incrementing=false;
	protected $fillable=array('OrderNumber','CustomerID','Proceesed','DateCreated');

	public function orderItems()
	{
		# code...

		 return $this->hasMany('OrderItem', 'OrderNumber','OrderNumber');
	}

public function items()
	{
//return $this->hasManyThrough('Order','OrderItem','OrderNumber','ItemID');
	//	return $this->hasManyThrough('Item','OrderItem','OrderNumber','ItemID');
		return $this->belongsToMany('Item','OrderItem','OrderNumber','ItemID')->withPivot('OrderedQty');
	}

	public function customer()
	{
		# code...

		 return $this->belongsTo('Customer', 'CustomerID','CustomerID');
	}
}