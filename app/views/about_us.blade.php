@extends((Auth::guest())?'Layout.master': 'Layout.userAccountMaster')

@section('content')

	
	<div class="container">
		<div style="max-width:800px;float:center;margin:50px;">
		
			@include('Layout.Helper.aboutUs')
		</div>

		
	<div>

@stop