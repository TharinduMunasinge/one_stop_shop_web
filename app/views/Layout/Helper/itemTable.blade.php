<div class='container' style="width:97%">

                   


<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr align="center">
			<td>Item Id</td>
			<td>Brand </td>
			<td>Item Type </td>
			<td>Size </td>
			<td>Buying Price </td>
			<td>ACTION </td>		
		</tr>
	</thead>
	<tbody>
	@foreach($data as $key => $value)
		<tr>
			<td>{{ $value->ItemID }}</td>
			
			<td>{{ $value->BrandName }}</td>
			<td>{{ $value->ItemTypeName }}</td>
			<td>{{ $value->SizeDesc }}</td>
			<td>{{ $value->BuyingPrice }}</td>
			
			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
				<!-- we will add this later since its a little more complicated than the first two buttons -->
				<!--{{ Form::open(array('url' => 'store' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete this Nerd', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}
	-->
				<!-- show the nerd (uses the show method found at GET /nerds/{id} -->
				
				<a class="btn btn-small btn-primary" href="{{ URL::to('store/'.$value->ItemID) }}">Show Item</a>

				<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
				
				@if(Session::has($value->ItemID))
				<a class="btn btn-small btn-warning" href="#" onclick="toggle({{$value->ItemID}},this)">
					Remove Cart
					</a>

				{{Form::selectRange($value->ItemID,1,$value->AvailableQty,Session::has($value->ItemID),array('style'=>'display:inline','id'=>$value->ItemID,'onchange'=>'addCart(this.id,this.selectedIndex)'))}}

				@else

				<a class="btn btn-small btn-warning" href="#" onclick="toggle({{$value->ItemID}},this)">
					Add Cart
					</a>

				{{Form::selectRange($value->ItemID,1,$value->AvailableQty,1,array('style'=>'display:none','id'=>$value->ItemID,'onchange'=>'addCart(this.id,this.selectedIndex)'))}}

				@endif



				


			</td>
		</tr>
	@endforeach
	</tbody>
</table>
<script>
					function toggle(x,y){
						var s=document.getElementById(x);
						if(y.innerHTML=="Add Cart"){
						
						s.style.display="inline";
						y.innerHTML='Remove Cart';
						}
						else
						{
							s.style.display="none";
						y.innerHTML='Add Cart';
						removeCart(x);
						}
					}
					
					
				</script>
</div>