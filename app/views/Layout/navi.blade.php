<nav style="margin-top:10px">
			<ul id="menu">
				<li class="alpha" id="{{($title=='home')? 'menu_active' : 'home'}}" ><a href="{{URL::route('home')}}"><span><span>Home</span></span></a>
				</li>
				<li id="{{($title=='About us')?'menu_active' : 'home'}}">
				<a href="{{URL::route('about_us')}}"><span><span>About Us</span></span></a></li>
				<li id="{{($title=='Store')? 'menu_active' : 'store'}}" ><a href="{{URL::route('store')}}"><span><span>Store</span></span></a></li>
				
				<li id="{{($title=='Login')? 'menu_active' : 'My Account'}}" ><a href="{{URL::route('login')}}"><span><span>My Account</span></span></a></li>
				<li class="omega" id="{{($title=='Contact us')? 'menu_active' : 'contact us'}}" ><a href="{{URL::route('contact-message')}}"><span><span>Contact</span></span></a></li>
			</ul>
</nav>