@extends('Layout.master')

@section('content')


	@include('Items.search')
@stop

@section('scripts')
{{HTML::script('js/AjaxCode.js')}}
@stop