<?php

class CustomerContact extends \Eloquent {
	protected $table='CustomerContact';
	public $primaryKey=array('ID','TelephoneNumber');
	public $timestamps=false;
	public  $incrementing=false;
	protected $fillable=array('ID','TelephoneNumber');
	
	public function customer()
	{
		# code...

		 return $this->belongsTo('Customer', 'ID');
	}




}