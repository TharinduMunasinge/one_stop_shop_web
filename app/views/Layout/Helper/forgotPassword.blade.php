<div class="container">

			      <form class="form-signin" action="{{URL::route('forgot-password')}}" method="POST">
			        <h2 class="form-signin-heading">Forgot password</h2>
			        <input type="text" class="input-block-level" placeholder="Email Address" name='email' value="{{e(Input::old('email'))}}">
					<span>{{$errors->first('email')}}</span>			   
     
			        

			        {{Form::token()}}
			        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
			      </form>

</div>