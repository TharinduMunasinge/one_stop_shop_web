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
Route::get('register',array(

						'as'=>'register',
						'uses'=>'AccountsController@getRegister'
					));




Route::group(array('before'=>'auth'), function(){
		//if the user is already loged in to system


		Route::group(array('before'=>'csrf'),function(){
				//password change form submited
				Route::post('passwordchange',array(

						'as'=>'password-change',
						'uses'=>'AccountsController@postPasswordChange'
				));

				Route::post('checkout',array(
			'as'=>'post-checkout',
			'uses'=>'ItemsController@postCheckout'));


		});


		Route::get('list-item',array(
			'as'=>'list-item',
			'uses'=>'CustomersController@showItemDetails'));



		Route::get('checkout',array(
			'as'=>'checkout',
			'uses'=>'ItemsController@getCheckout'));


		Route::get('customer',array(

						'as'=>'customer-home',
						'uses'=>'CustomersController@index'
				));

		Route::get('customer-store',array(

						'as'=>'customer-store',
						'uses'=>'CustomersController@searchItem'
				));








		Route::get('employee',array(

						'as'=>'employee-home',
						'uses'=>'EmployeesController@index'
				));


		//Route::get('')

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

		Route::get('contactus',array(
				'as'=>'contact',
				'uses'=>'AccountsController@getCreateMessage'
	));
});





Route::group(array('before'=>'guest'), function(){
		//if use is nt loged in following routes can be perforemed

	//csrf protection group
		Route::group(array('before'=>'csrf'),function(){
				
					//sign , registration form in public view


					Route::post('account/create',array(
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
		

		//regiter view in public layout
		Route::get('account-create',array(
		'as'=>'account-create',
		'uses'=>'AccountsController@getCreate'
		));


		//account activation url used in Email
		Route::get('account/{code}',array(
			'as'=>'account-activate',
			'uses'=>'AccountsController@getActivate'

		));
		//Route::post('contact',array(
		//'as'=>'contact-message',
		//'uses'=>'ContactUsController@postCreateMessage'
		//));


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
		Route::get('myaccount', array('as'=>'login',function()
		{
			return View::make('Accounts.create')->with('title','Login');
		}));		
});


Route::post('contactUs',array(
	'as'=>'contact-message',
	'uses'=>'ContactUsController@postCreateMessage'
	));


Route::get('contactUs',array(
	'as'=>'contact-message',
	function(){
		return View::make('contact')->with('title','Contact us');
	}
	));




Event::listen('illuminate.query', function($sql)
{
 //var_dump($sql);
});



Route::get('dbtest', array('as'=>'home',function()
{
	return URL::route('store',['keyword','x']);
}));


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



Route::get('store', array(
	'as'=>'store',
	'uses'=>'ItemsController@index'));

Route::get('store/{id}',array(
	'as'=>'store-item',

	'uses'=>'ItemsController@show'));

Route::get('store/{keyword}/{value}', 
	array('as'=>'store-search',
	'uses'=>'ItemsController@search'
	));


Route::get('cart', array(
	'as'=>'cart',
	function(){

		return Session::all();
	}));



Route::get('cart/add/{id}/{qty}', array(
	'as'=>'add-cart',
	'uses'=>'ItemsController@addCart'));

Route::get('cart/remove/{id}', array(
	'as'=>'remove-cart',
	'uses'=>'ItemsController@removeCart'));


Route::get('cart/show', array(
	'as'=>'show-cart',
	'uses'=>'ItemsController@showCart'));



//StoreItem::where($keyword,'like','%'.$value.'%');
Route::get('store/{keyword}/{value}',function($keyword,$value){

$data=StoreItem::where($keyword,'like','%'.$value.'%')->get();
$content=View::make('Layout.Helper.itemTable')->with('data',$data)->render();

$response = array(
            'status' => 'success',
            'msg' => $content
        );
 
 		 
	return $response;
});