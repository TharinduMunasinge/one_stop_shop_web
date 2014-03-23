 <div class="container" >
 
 

 <form class="form-horizontal" action="{{URL::route('account')}}" method="post">
		      	<fieldset>
					
		      		<h2 class="form-signin-heading">Register </h2>

 					<div class="control-group">
					    	<label class="control-label" for="inputFirstName">First Name :</label>
					    <div class="controls" >
					    	<input type="text" id="inputFirstName" placeholder="First Name" name='first_name' value="{{Input::old('first_name')}}">

					    	<span class="help-inline" style='color:red'>{{$errors->first('first_name')}}</span>

					    </div>
		    		</div>


		    		<div class="control-group">
					    	<label class="control-label" for="inputLastName">Last Name :</label>
					    <div class="controls">
					    	<input type="text" id="inputLastName" placeholder="Last Name" name='last_name' value="{{Input::old('last_name')}}">

					    	<span class="help-inline" style='color:red' style='color:red'>{{$errors->first('last_name')}}</span>

					    </div>
		    		</div>	

					 <div class="control-group">
					    	<label class="control-label" for="inputEmail">Email :</label>
					    <div class="controls">
					    	<input type="text" id="inputEmail" placeholder="Email" name='email' value="{{Input::old('email')}}">
					    	<span class="help-inline" style='color:red'>{{$errors->first('email')}}</span>

					    </div>
		    		</div>

		    		<div class="control-group">
					    	<label class="control-label" for="inputUsername">User Name :</label>
					    <div class="controls error">
					    	<input type="text" id="inputUserName" placeholder="Unique Name" name='user_name' value="{{Input::old('user_name')}}">
					    	<span class="help-inline" style='color:red' style='color:red'>{{$errors->first('user_name')}}</span>

					    </div>
		    		</div>


					<div class="control-group">
					    	<label class="control-label" for="inputPassword">Password :</label>
						<div class="controls">
						    <input type="password" id="inputPassword" placeholder="Password"  name='password'>
						    <span class="help-inline" style='color:red' style='color:red'>{{$errors->first('password')}}</span>

						</div>
		    		</div>
		    		<div class="control-group">
					    	<label class="control-label" for="inputRePassword">Re-type Password :</label>
						<div class="controls">
						    <input type="password" id="inputRePassword" placeholder="Re-Type password" name='retyped_password'>
						    <span class="help-inline" style='color:red'>{{$errors->first('retyped_password')}}</span>

						</div>
		    		</div>

		    		
		    		 
					<div class="control-group">
					    	<label class="control-label" for="inputAddressLine1">Addres No :</label>
						<div class="controls">
						    <input type="text" id="inputAddressLine1" placeholder="XXXXXXX" name="address_no" value="{{Input::old('address_no')}}">
						    <span class="help-inline" style='color:red' style='color:red'>{{$errors->first('address_no')}}</span>

						</div>
		    		</div>


		    		<div class="control-group">
					    	<label class="control-label" for="inputStreet">Street :</label>
						<div class="controls">
						    <input type="text" id="inputStreet" placeholder="Street" name="street" value="{{Input::old('street')}}">
						    <span class="help-inline" style='color:red' style='color:red'>{{$errors->first('street')}}</span>

						</div>
		    		</div>
		    		
		    		<div class="control-group">
					    	<label class="control-label" for="inputCity">City :</label>
						<div class="controls">
						    <input type="text" id="inputCity" placeholder="City" name="city" value="{{Input::old('city')}}">
						    <span class="help-inline" style='color:red' style='color:red'>{{$errors->first('city')}}</span>

						</div>
		    		</div>

		    		<div class="control-group">
					    	<label class="control-label" for="inputTele">Contact No :</label>
						<div class="controls">
						    <input type="text" id="inputTele" placeholder="+94 xxxxxxxxx" name="contact" value="{{Input::old('contact')}}">
						    <span class="help-inline" style='color:red' style='color:red'>{{$errors->first('contact')}}</span>

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