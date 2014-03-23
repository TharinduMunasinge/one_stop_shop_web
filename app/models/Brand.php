<?php

class Brand extends \Eloquent {
	protected $table='Brand';
	public $primaryKey='BrandCode';
	public $timestamps=false;
	public  $incrementing=false;
	protected $fillable=array('BrandCode','BrandName','Description');
	

	public function items()
	{
		# code...
		return $this->hasMany('Item','BrandCode','BrandCode');

	}

}