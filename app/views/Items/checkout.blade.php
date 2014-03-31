@extends('Layout.userAccountMaster')

@section('content')
<div style="margin:10px">

	Thanks for buying our stores!! <br>
	To complete the transaction we will redirect you to Paypal site<br>
	Click Following Paypal link to complete the Monney transaction...
	
	<a href='https://www.paypal.com' about='_blank'><img alt="buy now with PayPal" border="0" src="https://www.paypalobjects.com/webstatic/en_US/btn/btn_buynow_pp_142x27.png" />
	</a>

<br><br>
	{{Form::open(array('url'=>URL::route('post-checkout')))}}
Insert the Activation Code : <input type='text' name='acccode'>
<br>
	{{Form::token()}}

		 <button class="btn btn-large btn-primary" type="submit">Submit code</button>&nbsp;&nbsp;
	{{Form::close()}}
</div>	
@stop