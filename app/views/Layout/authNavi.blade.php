 <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="{{URL::route('home')}}">One Stop Shop</a>
          <div class="nav-collapse collapse">
            
            <ul class="nav">
              <li class="active"><a href="{{URL::route('signin')}}">Sign In</a></li>
              <li><a href="{{URL::route('forgot-password')}}">Forgot Password</a></li>
              <li><a href="{{URL::route('register')}}">Register </a></li>
              
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>