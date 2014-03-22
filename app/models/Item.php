<?php

class Item extends \Eloquent {
	protected $table='Item';
	public $primaryKey='ID';
	public $timestamps=false;
	public  $incrementing=true;
	protected $fillable=array('BrandCode','ItemTypeCode','Description','BuyingPrice','SellingPrice','LastIntake','LastBuyingQty','AvailableQty');
	

	public function itemType()
	{
		# code...
		return $this->belongsTo('ItemType','ItemTypeCode','ItemTypeCode');

	}

	public function brand()
	{
		# code...
		return $this->belongsTo('Brand','BrandCode','BrandCode');
	}

	
	public function orderItem()
	{

		return $this->hasMany('OrderItem','itemId','id');
	}
	

}