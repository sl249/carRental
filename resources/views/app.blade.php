<!DOCTYPE html>
  
  <html>
    
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{ URL::asset('css/materialize.min.css')}}"  media="screen,projection"/>

      <link type="text/css" rel="stylesheet" href="{{ URL::asset('css/styles.css')}}" media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    </head>

    <body>
      
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="{{ URL::asset('js/materialize.min.js')}}"></script>
      <script src="{{ URL::asset('js/init.js')}}"></script>

      <ul id="dropdown1" class="dropdown-content">
    
        <li><a href="/rentals"><h6>All Rentals</h6></a></li>
        <li class="divider"></li>
        <li><a href="/rentals/open"><h6>Open Rentals</h6></a></li>
        <li class="divider"></li>
        <li><a href="/rentals/closed"><h6>Closed Rentals</h6></a></li>
      
      </ul>

      <nav class="teal accent-4">

        <div class="nav-wrapper container"><a id="logo-container" href="/" class="brand-logo col ">Rent-a-Car</a>
          
          @if(Auth::check())

          <ul class="right hide-on-med-and-down">
            
            <li><a href="/logout">Logout</a></li>
            <li><a href="/rent">Rent a Car</a></li>
             <!-- Dropdown Trigger -->
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Rentals<i class="material-icons right">arrow_drop_down</i></a></li>
          
          </ul>

          @else
          
          <ul class="right hide-on-med-and-down">
            
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>
          
          </ul>

          @endif

          @if(Auth::check())

          <ul id="slide-out" class="side-nav">
            
            <li><a href="/">Home</a></li>
            <li><a href="/rent">Rent a Car</a></li>

            <ul class="collapsible black-text " data-collapsible="accordion">
              
              <li>
                
                <div class="collapsible-header"><i class="material-icons right">arrow_drop_down</i>Rentals</div>
                <div class="collapsible-body"><a href="/rentals">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All Rentals</a></div>
                <div class="collapsible-body"><a href="/rentals/open">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Open Rentals</a></div>
                <div class="collapsible-body"><a href="/rentals/closed">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Closed Rentalss</a></div>
              
              </li>
            
            </ul>
            
            <li><a href="/logout">Logout</a></li>

            
          </ul>

          @else

          <ul id="slide-out" class="side-nav">
          
            <li><a href="/">Home</a></li>
            <li><a href="/login">Login</a></li>
            <li><a href="/registe">Register</a></li>
          
          </ul>

          @endif

          <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

        </div>
      
      </nav>

      <main class="section no-pad-bot" id="index-banner">
        
        @yield('content')

      </main>

      <footer class="page-footer blue-grey darken-2">
          
          <div class="container">
            
            <div class="row">
              
              <div class="col l12 s12">
                @if(Auth::check())
                <h5 class="white-text">Welcome {{Auth::user()->firstName}}!</h5>
                <p class="grey-text text-lighten-4">You're seconds away from your next rental.</p>
                @else
                <h5 class="white-text">Welcome!</h5>
                <p class="grey-text text-lighten-4">Just Login and you'll be seconds away from your rental.</p>
                @endif

              </div>
            
            </div>
            
            <br><br><br>
          
          </div>
          
          <div class="footer-copyright">
            
            <div class="container">
            
            &copy; 2014 Rent-a-Car
            <a class="grey-text text-lighten-4 right" target="_blank" href="http://li-pizza.azurewebsites.net/">Great Pizza</a>
            
            </div>
          
          </div>
        
        </footer>
        
    </body>
 
  </html>
        