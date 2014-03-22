<div class="container">
			      <form class="form-signin" action="{{URL::route('password-change')}}" method="POST">
			        <h2 class="form-signin-heading">
			        	Change Password
			        </h2>

			        <input type="password" class="input-block-level" placeholder="Old Password" name='old_password' value="{{Input::old('old_password')}}">
					<span>{{$errors->first('old_password')}}</span>	

    				 <input type="password" class="input-block-level" placeholder="New Password" name='new_password'>
  					 <span>{{$errors->first('new_password')}}</span>	 

	  				 <input type="password" class="input-block-level" placeholder="Retype Password" name='re_password'>
  					 <span>{{$errors->first('re_password')}}</span>	 

			        
			        {{Form::token()}}
			        <button class="btn btn-large btn-primary" type="submit">Change</button>
			      </form>

</div>