<header>
		<div class="wrapper" >
				<div style="float:left">
					<h1>
						{{HTML::image("images/logo.png", "one STOP shop",array('id'=>'logo'))}}
					</h1>
				</div>
				<div class="bg" style="float:right">

					<form id="search" action="{{URL::route('signin')}}" method="GET">
					<input type="submit" class="btn btn btn-info btn-large" value="Sign in">
					</form>		
				</div>
			
		</div>
		
		@include('Layout.navi')

		<div class="wrapper">
			<div class="text">
				<span class="text1">Buy<span> All Under One Roof</span></span>
				<a href="#" class="button">Start Shopping !!!</a>
			</div>
		</div>
</header>