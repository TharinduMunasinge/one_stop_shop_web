@extends((Auth::guest())?'Layout.master': 'Layout.userAccountMaster')


@section('content')
 <div class="container">
<div style="margin:20px">

 <h2>Item Details</h2> 
			    	
			 <div style="width:400px;float:left;">
			    <table class="table table-striped" >
				  <tbody>
					    <tr class="success">
					    <td>ID:</td>
					    <td>{{$data->ItemID}}</td>
					    </tr>

					    <tr>
					    <td>BrandName :</td>
					    <td>{{$data->BrandName}}</td>
					    </tr>

					    <tr class="success">
					    <td>ItemName :</td>
					    <td>{{$data->ItemTypeName}}</td>
					    </tr>

					    <tr>
					    <td>Available Qty :</td>
					    <td>{{$data->AvailableQty}}</td>
					    </tr>

					    <tr class="success">
					    <td>Size :</td>
					    <td>{{$data->SizeDesc}}</td>
					    </tr>

					    
					<tr>
					    <td>Description :</td>
					    <td>{{$data->ItemDescription}}</td>
					    </tr>

					    

					    </tbody>
			    </table>
					
			</div>

			<div style='float:right;width:300px'>
					{{HTML::image("images/Items/".$data->image()->first()->image,'Image',array('class'=>'img-polaroid','width'=>200,'height'=>200,))}}
					
					<br> <br> <br>
					<a class="btn btn-primary btn-large" href="{{ URL::to('store') }}">Go to Store</a>

					
			</div>

</div>

<!-- {{$data->image()->first()->image}} -->
</div>

@stop