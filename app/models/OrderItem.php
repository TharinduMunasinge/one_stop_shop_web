<?php

class OrderItem extends \Eloquent {
	protected $table='OrderItem';
	public $primaryKey=array('OrderNumber','itemID');
	public $timestamps=false;
	public  $incrementing=false;
	protected $fillable=array('itemID','OrderNumber','OrderedQty','BrandCode','ItemTypeCode');
	

	public function item()
	{
		# code...
		return $this->belongsTo('Item','itemID','id');
	}

	public function order()
	{
		return $this->belongsTo('Order','OrderNumber','OrderNumber');
	}

}