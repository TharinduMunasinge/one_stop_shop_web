 <div class="container" >
 
 @if(Session::has('global'))
 	{{Session::get('global')}}
 @endif

 <form class="form-horizontal" action="{{URL::route('account')}}" method="post">
		      	<fieldset>
					
		      		<h2 class="form-signin-heading">Register </h2>

 					<div class="control-group error">
					    	<label class="control-label" for="inputName">Name :</label>
					    <div class="controls">
					    	<input type="text" id="inputName" placeholder="Full Name" name='name' value="{{Input::old('name')}}">

					    	<span class="help-inline">{{$errors->first('name')}}</span>

					    </div>
		    		</div>

					 <div class="control-group error">
					    	<label class="control-label" for="inputEmail">Email :</label>
					    <div class="controls">
					    	<input type="text" id="inputEmail" placeholder="Email" name='email' value="{{Input::old('email')}}">
					    	<span class="help-inline">{{$errors->first('email')}}</span>

					    </div>
		    		</div>

		    		<div class="control-group error">
					    	<label class="control-label" for="inputUsername">User Name :</label>
					    <div class="controls error">
					    	<input type="text" id="inputUserName" placeholder="Unique Name" name='user_name' value="{{Input::old('user_name')}}">
					    	<span class="help-inline">{{$errors->first('user_name')}}</span>

					    </div>
		    		</div>


					<div class="control-group error">
					    	<label class="control-label" for="inputPassword">Password :</label>
						<div class="controls">
						    <input type="password" id="inputPassword" placeholder="Password"  name='password'>
						    <span class="help-inline">{{$errors->first('password')}}</span>

						</div>
		    		</div>
		    		<div class="control-group error">
					    	<label class="control-label" for="inputRePassword">Re-type Password :</label>
						<div class="controls">
						    <input type="password" id="inputRePassword" placeholder="Re-Type password" name='retyped_password'>
						    <span class="help-inline">{{$errors->first('retyped_password')}}</span>

						</div>
		    		</div>

		    		
		    		 
					<div class="control-group error">
					    	<label class="control-label" for="inputAddressLine1">Addres No :</label>
						<div class="controls">
						    <input type="text" id="inputAddressLine1" placeholder="XXXXXXX" name="address_no" value="{{Input::old('address_no')}}">
						    <span class="help-inline">{{$errors->first('address_no')}}</span>

						</div>
		    		</div>


		    		<div class="control-group error">
					    	<label class="control-label" for="inputStreet">Street :</label>
						<div class="controls">
						    <input type="text" id="inputStreet" placeholder="Street" name="street" value="{{Input::old('street')}}">
						    <span class="help-inline">{{$errors->first('street')}}</span>

						</div>
		    		</div>
		    		
		    		<div class="control-group error">
					    	<label class="control-label" for="inputCity">City :</label>
						<div class="controls">
						    <input type="text" id="inputCity" placeholder="City" name="city" value="{{Input::old('city')}}">
						    <span class="help-inline">{{$errors->first('city')}}</span>

						</div>
		    		</div>

		    		<div class="control-group error">
					    	<label class="control-label" for="inputTele">Contact No :</label>
						<div class="controls">
						    <input type="text" id="inputTele" placeholder="+94 xxxxxxxxx" name="contact" value="{{Input::old('contact')}}">
						    <span class="help-inline">{{$errors->first('contact')}}</span>

						</div>
		    		</div>

		    		{{Form::token()}}

				   
				        <div class="form-actions">
    						<button type="submit" class="btn btn-large btn-primary ">Register</button>
    						<button type="button" class="btn btn-large btn-warning">clear</button>
   					 </div>
				</fieldset>
</form>
</div>