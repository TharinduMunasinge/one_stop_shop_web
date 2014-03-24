<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
| 
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//Authendicated group





Route::group(array('before'=>'auth'), function(){
		//if the user is already loged in to system


		Route::group(array('before'=>'csrf'),function(){
				//password change form submited
				Route::post('passwordchange',array(

						'as'=>'password-change',
						'uses'=>'AccountsController@postPasswordChange'
				));

		});

		//acount password change View route
		Route::get('passwordchange',array(

						'as'=>'password-change-view',
						'uses'=>'AccountsController@getPasswordChange'
				));

		//account home page View
		Route::get('test',array(
			'as'=>'test',
			'uses'=>'UsersController@index'));


		//sign out route
		Route::get('sing-out',array(
		'as'=>'account-signout',
		'uses'=>'AccountsController@getSignOut'
		));

		//profile route
		Route::get('user/{username}',array(
			'as'=>'profile-user',
			'uses'=>'ProfilesController@index'));
});





Route::group(array('before'=>'guest'), function(){
		//if use is nt loged in following routes can be perforemed

	//csrf protection group
		Route::group(array('before'=>'csrf'),function(){
				
					//sign , registration form in public view
					Route::post('account',array(
					'as'=>'account',
					'uses'=>'AccountsController@postCreate'
					));


					//sign in function 
					Route::post('signin',array(

						'as'=>'signin',
						'uses'=>'AccountsController@postSignIn'
					));

					//fogot password function
					Route::post('forgot-password',array(
						'as'=>'forgot-password',
						'uses'=>'AccountsController@postForgotPassword'));
		});
		
		//forgot password view	
		Route::get('forgot-password',array(
						'as'=>'forgot-password',
						'uses'=>'AccountsController@getForgotPassword'));

		
		//register view in account layoute
		Route::get('register',array(

						'as'=>'register',
						'uses'=>'AccountsController@getRegister'
					));

		//regiter view in public layout
		Route::get('account',array(
		'as'=>'account-create',
		'uses'=>'AccountsController@getCreate'
		));


		//account activation url used in Email
		Route::get('account/{code}',array(
			'as'=>'account-activate',
			'uses'=>'AccountsController@getActivate'

		));
		Route::post('contact',array(
		'as'=>'contact-message',
		'uses'=>'ContactUsController@postCreateMessage'
		));


		//Recover page used in recovery email
		Route::get('recover/{code}',array(
			'as'=>'account-recover',
			'uses'=>'AccountsController@getRecover'
		));


		//sigin in  View in account layout
		Route::get('signin',array(

						'as'=>'signin',
						'uses'=>'AccountsController@getSignIn'
					));


		//myaccount link's route 
		Route::get('login', array('as'=>'login',function()
		{
			return View::make('Accounts.create')->with('title','Login');
		}));		
});

Route::post('contact',array(
	'as'=>'contact-message',
	'uses'=>'ContactUsController@postCreateMessage'
	));

Route::get('dbtest',function(){

	return MailOrderCustomer::with('Customer')->where('CustomerID','000001')->first();
});



Event::listen('illuminate.query', function($sql)
{
   var_dump($sql);
});



//email testing route
Route::get('mail',function(){

	Mail::send('emails.auth.test', array('name'=>'alax'),function($message){
		$message->to('munasinghetharindu@gmail.com')->subject('Test email');
	});
});


//home route
Route::get('/', array('as'=>'home',function()
{
	return View::make('index')->with('title','home');
}));

//about us route
Route::get('about_us', array('as'=>'about_us',function()
{
	return View::make('about_us')->with('title','About us');
}));



Route::get('store', array('as'=>'store',function()
{
	return View::make('Item.index')->with('title','Store');
}));


Route::get('contact', array('as'=>'contact',function()
{
	return View::make('contact')->with('title','Contact Us');
}));



Route::get('user','UsersController@index');