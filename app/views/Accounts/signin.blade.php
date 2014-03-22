@extends('Layout.authMaster')

@section('form')
	@include('Layout.Helper.signin')
	
		<a href="{{URL::route('forgot-password')}}">New user? </a>
@stop