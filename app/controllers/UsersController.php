<?php 

/**
* 
*/
class UsersController extends BaseController
{
	//protected $table='test';
	//public $primaryKey=array('username','password');
	//public $timestamps=false;
	//public  $incrementing=false;
	public function index()
	{
		# code...
		return View::make('Users.index')->with('title','home');

	}
}