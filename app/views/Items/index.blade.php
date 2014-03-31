@extends((Auth::guest())?'Layout.master': 'Layout.userAccountMaster')

@section('content')

	
                    

	@include('Items.search')
@stop

@section('scripts')
{{HTML::script('js/AjaxCode.js')}}
@stop