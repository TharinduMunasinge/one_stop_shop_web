@extends((Auth::guest())?'Layout.master': 'Layout.userAccountMaster')

@section('content')

	
	<div class="container">
		<div style="max-width:350px;float:left;margin:20px;">
		
			@include('Layout.Helper.contactUs')
		</div>	
		
		
			
		<div style="max-width:400px;float:right;margin:20px;">
			
			<address>
				<strong>Address : </strong><br>
				One Stop Shop (pvt) Ltd.
				Bandaranayaka Mavatha,<br>
				Katubedda,<br>
				Moratuwa.
				<br>
				<abbr title="Phone">Phone :</abbr> (+94) 77 0480887
			</address>
			<br>
		<address>
				<strong>Email Address: </strong><br>
					<a href="mailto:#">onestopshop.aurora@gmail.com</a>
		</address>
	<br><br>
	<img src="images/map.jpg"  with='80%' class="img-polaroid"> 
			 
		</div>
	<div>		


	<div>

@stop