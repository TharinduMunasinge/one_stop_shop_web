<?php

class AccountsController extends BaseController {



	public function getRegister()
	{

		return View::make('Accounts.register');
	}
	


	public function getSignOut()
	{
			Auth::logout();	
			return Redirect::route('home');
	}

	public function getSignIn()
	{
			return View::make('Accounts.signin');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//protected $restfull=false;
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		//

		return View::make('Accounts.create')->with('title','home');
	}

	public function postCreate()
	{
		$validator= Validator::make(Input::all(),array(
				'email'=>'required|email|unique:Customer,email',
				'first_name'=>'required',
				'last_name'=>'required',
				'user_name'=>'required|unique:UserAccount,username',
				'password'=>'required',
				'retyped_password'=>'required|same:password',
				'contact'=>'required',
				'address_no'=>'required',
				'street'=>'required',
				'city'=>'required',
				
			));
		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();

		}
		else
		{
			$email =Input::get('email');
			$password =Hash::make(Input::get('password'));
			$username=Input::get('user_name');
			$code=str_random(60);
			$user=new UserAccount();
			//Tempory solution for ID increment
			
			    
			

			$acno=Customer::select('CustomerID')->orderBy('CustomerID', 'desc')->first()->CustomerID+1;
			$acno="00000".$acno;

			$customer =new Customer();
			
			$customer->CustomerID=$acno;
			$customer->FirstName=Input::get('first_name');
			$customer->LastName=Input::get('last_name');
			$customer->AddressCity=Input::get('city');
			$customer->AddressStreet=Input::get('street');
			$customer->AddressNumber=Input::get('address_no');
			$customer->Email=Input::get('email');
			$customer->CustomerType='M';
			$customer->save();


			$user=new UserAccount();
			$user->UserName=$username;
			$user->Password=$password;
			$user->AccountType='CU';
			$user->AccountNumber=$acno;
			$user->save();



			$webUser=new WebUser(array('code'=>$code,'activated'=>0));
			$user->webUser()->save($webUser);


			
			

/*
			$user=UserAccount::create(array(
				'email'=>$email,
				'password'=>Hash::make($password),
				'username'=>$username,
				'code'=>$code,
				'activate'=> 'False'
			));
*/
			if($user){

				$user->email=$email;
				Mail::send('emails.auth.activate',array('link'=>URL::route('account-activate',$code),'username' =>$username),function($message) use ($user)
				{
					$message->to($user->email,$user->Username)->subject('Activate your account'); 
					# code...
				});

				return Redirect::back()->with('global','your account has been created! we haev send activation email !!!');

			}
			else
			{
				
			}

			return Redirect::back()->with('global','UserAccount is not created');

			//die('Success');
		}
		//print_r(Input::all());
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	public function getCreateMessage()
	{
		return View::make('Accounts.contact');
	}
	public function store()
	{
		//
	}


	public function getActivate($code)
	{
		$usr=WebUser::where('code',$code)->where('activated',0);
		if($usr->count())
		{
			$usr=$usr->first();
			$usr->activated=1;
			$usr->code='';
			$usr->save();

			if($usr->save())
			{
				return Redirect::route('account')->with('global','Succefully activated');


			}
			//echo '<pre>'.print_r($usr).'</pre>';
				
		}

		return Redirect::route('account')->with('gloabl',"coulnd't activate your accout");
		
	}


	public function postPasswordChange()
	{

		$validator= Validator::make(Input::all(),array(
				'old_password'=>'required',
				'new_password'=>'required',
				're_password'=>'required|same:new_password',
				
		));

		if($validator->fails())
		{
			return Redirect::route('password-change-view')->withErrors($validator);

		}else{
			$user=User::find(Auth::user()->username);
			$old_password=Input::get('old_password');
			$password=Input::get('new_password');

			if(Hash::check($old_password,$user->getAuthPassword( ))){
				//passwrods are matches...... 
				$user->password=Hash::make($password);
				if($user->save()){
					return Redirect::back()->with('global',"your password has changed");
				}

			}else
			{

				return Redirect::back()->with('global',"Your old password is incorrect");
			}
			return Redirect::back()->with('global','You can not changed the password');				
		}
	}


	public function getForgotPassword(){
		return 	View::make('Accounts.forgotPassword');
	}

	public function postForgotPassword(){

		$validator= Validator::make(Input::all(),array(
			'email'=>'required|email',
						
		));


		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();

		}else{
			$email=Input::get('email');

			$user=Customer::where('Email','=',$email);

			if($user->count())
			{


				$user=$user->first()->user()->first();

				$code=str_random(60);
				$password=str_random(10);
				$user->code=$code;
				$user->temp_password=Hash::make($password);
				if($user->save())
				{
					$user->email=$email;
					Mail::send('emails.auth.recover',array('link'=>URL::route('account-recover',$code),'username'=>$user->username,'password'=>$password),function($message) use ($user){
						$message->to($user->email,$user->username)->subject('Your new password');

					});
					return Redirect::route('account')->with('global','We have sent you a new password by email');		
				}else
				{

				}

			}else{

				return Redirect::back()->with('global','Invalid email address');
			}		
		}


	}

	public function getRecover($code)
	{

		$webusr=WebUser::where('code',$code)->where('temp_password','!=','')->first();
		if($webusr->count())
		{
			$usr=$webusr->userAccount()->first();
			$usr->password=$webusr->temp_password;
			$webusr->temp_password='';
			$webusr->code='';

			if($usr->save())
			{
				return Redirect::route('account')->with('global','Succefully Recover the password so that you can now log into using new password');


			}
			//echo '<pre>'.print_r($usr).'</pre>';
				
		}

		return Redirect::route('account')->with('gloabl',"coulnd't recover your accout . Try again !!!1");
	}

	public function postSignIn(){
		$validator= Validator::make(Input::all(),array(
				'User_name'=>'required',
				'Password'=>'required',
				
			));
		if($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();

		}else{

			$remember=(Input::has('remember'))? true :false;
			//return Input::get('User_name').Input::get('Password');
			if(Auth::attempt(array('username'=>Input::get('User_name'),'password'=>Input::get('Password'),'activated'=>1),$remember))
			{
				if(Auth::user()->AccountType=='CU')
					return Redirect::route('customer-home');
				else
					return Redirect::route('employee-home');
				return Redirect::route('test');

			}
			else
			{
				return Redirect::back()->with('global','Error in loggin');
			}
		
		}
	}


	public function getPasswordChange()
	{

		return View::make('Accounts.changePassword');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}