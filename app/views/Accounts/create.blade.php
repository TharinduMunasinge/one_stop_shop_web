@extends('Layout.master')

@section('content')
	
	<div class="container">
		<div style="max-width:400px;float:left;margin:20px;">
		
			@include('Layout.Helper.signin')
		</div>

		<div style="max-width:500px;float:right;margin:20px;">
			
			@include('Layout.Helper.register')
			 
		</div>
	<div>

@stop