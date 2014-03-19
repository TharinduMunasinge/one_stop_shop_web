<div class="container">

			      <form class="form-signin" action="{{URL::route('account')}}">
			        <h2 class="form-signin-heading">Please sign in</h2>
			        <input type="text" class="input-block-level" placeholder="User Name" name='uname'>
			        <input type="password" class="input-block-level" placeholder="Password" name='pass'>
			        <label class="checkbox">
			          <input type="checkbox" value="remember-me"> Remember me
			        </label>
			        {{Form::token()}}
			        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
			      </form>

</div>