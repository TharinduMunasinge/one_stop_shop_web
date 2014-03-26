<?php
class StoreItem extends \Eloquent {
	protected $table='StoreItem';
	public $primaryKey='ItemId';
	public $timestamps=false;
	public  $incrementing=false;
	//protected $fillable=array('BrandCode','BrandName','Description');
	
	public function image()
	{

		return $this->hasOne('ItemImage','ItemID','ItemID');
	}
	

}