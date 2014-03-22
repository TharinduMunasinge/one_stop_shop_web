<?php

class ItemType extends \Eloquent {
	protected $table='ItemType';
	public $primaryKey='ItemTypeCode';
	public $timestamps=false;
	public  $incrementing=false;
	protected $fillable=array('ItemTypeCode','ItemTypeName');
	

	public function item()
	{
		# code...
		return $this->hasMany('Item','ItemTypeCode','ItemTypeCode');

	}

	
	
}