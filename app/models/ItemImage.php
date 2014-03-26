<?php

class ItemImage extends \Eloquent {
	protected $table='ItemImage';
	public $primaryKey='ItemID';
	public $timestamps=false;
	public  $incrementing=true;
	//protected $fillable=array('BrandCode','ItemTypeCode','Description','BuyingPrice','SellingPrice','LastIntake','LastBuyingQty','AvailableQty');
	

	public function item()
	{
		# code...
		return $this->belongsTo('Item','ItemID','ItemID');
	}

	public function storeItem()
	{
		# code...
		return $this->belongsTo('StoreItem','ItemID','ItemID');
	}
}