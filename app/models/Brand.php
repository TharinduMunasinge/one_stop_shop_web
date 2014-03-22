<?php

class Brand extends \Eloquent {
		protected $table='Brand';
	public $primaryKey='BrandCode';
	public $timestamps=false;
	public  $incrementing=false;
	protected $fillable=array('Brand','BrandName');
	

	public function item()
	{
		# code...
		return $this->hasMany('Item','BrandCode','BrandCode');

	}

}