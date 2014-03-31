<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr align="center">
			<td>Item Id</td>
			<td>Brand </td>
			<td>Item Type </td>
			<td>Size </td>
			<td>Item Price</td>
			<td>Qty </td>
			<td>Price</td>		
		</tr>
	</thead>
	<tbody>
	<?php 
	$total=0;
	foreach($data as $key => $value){
	$price= Session::get($value->ItemID)*$value->BuyingPrice;
	$total+=$price;	

	?>	

		<tr>
			<td>{{ $value->ItemID }}</td>
			
			<td>{{ $value->BrandName }}</td>
			<td>{{ $value->ItemTypeName }}</td>
			<td>{{ $value->SizeDesc }}</td>
			<td>{{ $value->BuyingPrice }}</td>
			<td>{{ Session::get($value->ItemID)}}</td>
			<td>{{$price}}</td>
			<!-- we will also add show, edit, and delete buttons -->
				
		</tr>
	<?php } 
	?>
	
	</tbody>
</table>
<div>
	Total : Rs.{{$total}}
	</div>