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


    public function addCart($id,$qty)
    {

		Session::put($id,$qty);
    	//$response = array('msg'=>$qty." of ItemID ".$id." Added to Your cart");
 		//Session::flash('global',$qty." of ItemID ".$id." Added to Your cart");
        return $qty." of ItemID ".$id."is  Added to Your cart";

    }

     public function showCart()
    {
    	$list=array();
    	$items=Session::all() ;
    	$i=0;
    	foreach($items as $key => $value)
		{
			if(is_int($key))
		    $list[$i++]=$key;
		}

    	
    	if($i!=0){
    	$data=StoreItem::whereIn('ItemID', $list)->get();
    	return View::make('Items.cart')->with('data',$data);
    	}

    	else
    	return "Sorry No items are added yet !!!";
    }

      public function removeCart($id)
    {

    	if(Session::has($id))
		 Session::forget($id,0);
    	
    	return " ItemID ".$id." is removed from  Your cart";
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



	public function getOrderNO($acno)
	{
		$count=Str::length($acno);
		
		for($i=$count;$i<=5;$i++)
			$acno = "0".$acno;
		return $acno;	
	}



	public function postCheckout()
	{

		$list=array();
    	$items=Session::all() ;
    	$i=0;

    	$orderno=Order::select('OrderNumber')->orderBy('OrderNumber', 'desc')->first();
			if($orderno==null)
				$orderno=1;
			else
				$orderno=$orderno->OrderNumber+1;


		$orderno=$this->getOrderNO($orderno);

		foreach($items as $key => $value)
		{
			if(is_int($key))
		    $list[$i++]=$key;
		}



		if($i!=0){

    	$order=new Order();
    	$order->OrderNumber=$orderno;
    	$order->CustomerID= Auth::user()->AccountNumber;
    	$order->Proceesed=false;
    	$order->Credited=false;
    	$order->DateCreated=time();
    	$order->save();

    	foreach($list as $key )
		{
			if(is_int($key)){
		   		$item= Item::find($key);
		   		$item->AvailableQty=$item->AvailableQty- Session::get($key);
		   		$item->save();


		   		$orderItem=new OrderItem();
		   		$orderItem->OrderNumber=$orderno;
		   		$orderItem->ItemID=$key;
		   		$orderItem->OrderedQty=Session::get($key);
		   		$orderItem->save();
		   		Session::forget($key);
		   	
		   	}
		}

		
    return Redirect::back()->with('global',"Completely added the record!!!");
		    	
    	}
    	else
    return Redirect::back()->with('global', "Sorry No items are selected to shop !!!");
				
	}



	public function getCheckout()
	{

		//return "helo";
		return View::make('Items.checkout');		
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