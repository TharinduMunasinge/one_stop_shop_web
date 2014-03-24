<div class="container">

			      <form class="form-contactus" action="{{URL::route('contact')}}"  method="post">
			      <span class="help-inline-success">@if(Session::has('global'))
 					{{Session::get('global')}}
 					@endif
 					</span> 
			        <h2 class="form-contactus-heading">Contact Us</h2>			  
			        <label class="control-label" for="inputName">Name* :</label> 			        
			        <input type="text" class="input-block-level" placeholder="Name" name='name'>
  					<span class="help-inline-error">{{$errors->first('name')}}</span>			      
   		        	<label class="control-label" for="inputEmail">Email* :</label> 
			        <input type="text" class="input-block-level" placeholder="Email" name='email'>
  					<span class="help-inline-error">{{$errors->first('email')}}</span>
				    <label class="control-label" for="inputSubject">Subject* :</label>
			        <input type="text" class="input-block-level" placeholder="Subject" name='subject'>
			        <span class="help-inline-error">{{$errors->first('subject')}}</span>
			        <label class="control-label" for="inputMessage">Message* :</label>
			        <textArea class="input-block-level-textarea" name="message" cols="75" rows="8"></textArea>
			        <span class="help-inline-error">{{$errors->first('message')}}</span>
			      <br>
			        <button class="btn btn-large btn-primary" type="submit">Submit</button>
			      </form>

</div>