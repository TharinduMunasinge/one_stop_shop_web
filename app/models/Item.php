<?php

class Item extends \Eloquent {
	protected $table='Item';
	public $primaryKey='ItemID';
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

		return $this->hasMany('OrderItem','ItemID','ItemID');
	}
	
	public function orders()
	{

		//return $this->hasManyThrough('Order','OrderItem','OrderNumber','ItemID');

		return $this->belongsToMany('Order','OrderItem','ItemID','OrderNumber')->withPivot('OrderedQty');
	}

}