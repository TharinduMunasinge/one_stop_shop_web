<?php

class ItemsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	$data=StoreItem::all();
	return View::make('Items.index')->with('title','Store')->with('data',$data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function search($keyword,$value) {
        //check if its our form
        //if ( Session::token() !== Input::get( '_token' ) ) {
          //  return Response::json( array(
            //    'msg' => 'Unauthorized attempt to create setting'
            //) );
        //}
 
         //.....
        //validate data
        //and then store it in DB
        //.....

        if($keyword=='test')
        	$value='%'.$value.'%';

        else
        	$value='%'.$value;

 		$data=StoreItem::where($keyword,'like',$value)->get();

 		$content=View::make('Layout.Helper.itemTable')->with('data',$data)->render();

        $response = array(
            'status' => 'success',
            'msg' => $content,
        );
 
        return Response::json( $response );
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
		$data=StoreItem::find($id)->first();
		
		return View::make('Items.show')->with('data',$data)->with('title','Show Item');
	
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