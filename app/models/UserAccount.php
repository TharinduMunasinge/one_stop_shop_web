<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserAccount extends Eloquent implements UserInterface, RemindableInterface {


	protected $fillable=array('username','password','AccountType','AccountNumber');
	//public $timestamps=false;
	public $primaryKey='username';
	public $timestamps=false;
	public  $incrementing=false;	
	protected $userType='';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */


	protected $table = 'UserAccount';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}


	public function customer()
	{
		# code...

		 return $this->belongsTo('Customer', 'AccountNumber');
	}

	public function employee()
	{
		# code...

		 return $this->belongsTo('Employee', 'AccountNumber');
	}
	public function user(){

	//	if()
		if(!$this->userType)
		{
			$this->userType=$this->AccountType;
		}

		if($this->userType=='CU')
		{
			return $this->customer();
		}

		if($this->userType=='SR')
		{
			return $this->employee();
		}
	}

	public function webUser()
	{
			 return $this->hasOne('WebUser','username','username');
	
	}

}