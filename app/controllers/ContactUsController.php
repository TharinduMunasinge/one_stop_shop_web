<?php

class ContactUsController extends BaseController {

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


	public function postCreateMessage()
	{
		$validator= Validator::make(Input::all(),array(
				'email'=>'required|email',
				'name'=>'required',
				'subject'=>'required',
				'message'=>'required',
				
			));
		if($validator->fails())
		{
			return Redirect::route('contact')->withErrors($validator)->withInput();

		}
		else
		{
			$name =Input::get('name');
			$email =Input::get('email');
			$subject=Input::get('subject');
			$textMessage=Input::get('message');
		

			$data = array('name'=>$name, 'email'=>$email, 'textMessage'=>$textMessage, 'subject'=>$subject);
		    Mail::send('emails.contactus.contactus', $data, function($message) use ($email, $name, $subject)
		    {   
		        $message->from($email, $name);
		        $message->to('gayanmettananda@gmail.com');
		        $message->subject($subject);
		    });


				return Redirect::route('contact')->with('global','Your message has been sent');

			
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