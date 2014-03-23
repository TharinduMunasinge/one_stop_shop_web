<?php

class OrderItem extends \Eloquent {
	protected $table='OrderItem';
	public $primaryKey='ItemID';
	public $timestamps=false;
	public  $incrementing=false;
	protected $fillable=array('ItemID','OrderNumber','OrderedQty');
	

	public function item()
	{
		# code...
		return $this->belongsTo('Item','ItemID','ItemID');
	}

	public function order()
	{
		return $this->belongsTo('Order','OrderNumber','OrderNumber');
	}

}