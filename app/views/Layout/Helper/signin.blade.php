<div class="container">

			      <form class="form-signin" action="{{URL::route('signin')}}" method="POST">
			        <h2 class="form-signin-heading">Please sign in</h2>
			        <input type="text" class="input-block-level" placeholder="User Name" name='User_name' value="{{Input::old('User_name')}}">
<span>{{$errors->first('User_name')}}</span>			   
     <input type="password" class="input-block-level" placeholder="Password" name='Password'>
    <span>{{$errors->first('Password')}}</span>	 
			        <label class="checkbox">
			          <input type="checkbox" value="remember-me" name="remember"> Remember me
			        </label>

			        

			        {{Form::token()}}
			        <button class="btn btn-large btn-primary" type="submit">Sign in</button>&nbsp;&nbsp;

			       
			        <a href="{{URL::route('forgot-password')}}"> Forgot password ?</a>
			          <br><br><a href="{{URL::route('register')}}">A New User?</a>
			      </form>
			      

</div>