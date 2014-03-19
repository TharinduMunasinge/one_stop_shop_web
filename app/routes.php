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


Route::group(array('before'=>'guest'), function(){

	//csrf protection group
		Route::group(array('before'=>'csrf'),function(){
				
				
					Route::post('account',array(
					'as'=>'account',
					'uses'=>'AccountsController@postCreate'
					));

		});

		Route::get('account',array(
		'as'=>'account-create',
		'uses'=>'AccountsController@getCreate'
		));



});






Route::get('mail',function(){

	Mail::send('emails.auth.test', array('name'=>'alax'),function($message){
		$message->to('munasinghetharindu@gmail.com')->subject('Test email');
	});
});

Route::get('/', array('as'=>'home',function()
{
	return View::make('index')->with('title','home');
}));

Route::get('home', array('as'=>'about_us',function()
{
	return View::make('about_us')->with('title','About us');
}));
Route::get('store', array('as'=>'store',function()
{
	return View::make('Item.index')->with('title','Store');
}));
Route::get('login', array('as'=>'login',function()
{
	return View::make('Accounts.create')->with('title','Login');
}));

Route::get('contact', array('as'=>'contact',function()
{
	return View::make('contact')->with('title','Contact Us');
}));


Route::get('test',function(){

	return View::make('Users.index');
});
Route::get('user','UsersController@index');