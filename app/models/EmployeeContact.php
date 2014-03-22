<?php

class EmployeeContact extends \Eloquent {
	protected $table='EmployeeContact';
	public $primaryKey=array('ID','TelephoneNumber');
	public $timestamps=false;
	public  $incrementing=false;
	protected $fillable=array('ID','TelephoneNumber');

	public function employee()
	{
		# code...

		 return $this->belongsTo('Employee', 'ID');
	}

}