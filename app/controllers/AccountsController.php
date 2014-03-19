<?php

class AccountsController extends BaseController {

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
				'email'=>'required|email|unique:users,email',
				'name'=>'required',
				'user_name'=>'required|unique:users,username',
				'password'=>'required',
				'retyped_password'=>'required|same:password',
				'contact'=>'required',
				'address_no'=>'required',
				'street'=>'required',
				'city'=>'required',
				
			));
		if($validator->fails())
		{
			return Redirect::route('account')->withErrors($validator)->withInput();

		}
		else
		{
			$email =Input::get('email');
			$password =Input::get('password');
			$username=Input::get('user_name');
			$code=str_random(60);

			$user=User::create(array(
				'email'=>$email,
				'password'=>Hash::make($password),
				'username'=>$username,
				'code'=>$code,
				'activate'=> 'False'
			));

			if($user){

				Redirect::route('account')->with('global','your account has been created! we haev send activation email !!!');

			}
			else
			{
				
			}
			//die('Success');
		}
		//print_r(Input::all());
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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