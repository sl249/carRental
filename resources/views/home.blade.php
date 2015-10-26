@extends('app')

@section('content')

<div class="container">

  <h2 class="header center teal-text accent-4 thin">Choose a Vehicle Type</h2>
  
  <div class="row">
  
    <div class="col s12 m6 l4">
      
      <div class="card hoverable">
    
        <div class="card-image">
      
          <img src="images/compact.png">
          <span class="card-title">Compact Cars</span>
        
        </div>
        
        <div class="card-content">
          
          <p>Starting at $19.95 per day</p>
        
        </div>
        
        <div class="card-action">
          
          @if(Auth::check())

          <a class="teal-text accent-4 " href="/rent/Compact">Rent Now</a>

          @else

          <a class="teal-text accent-4" href="/login">Rent Now</a>

          @endif
        
        </div>
    
      </div>
  
    </div>

    <div class="col s12 m6 l4">
      
      <div class="card hoverable">
    
        <div class="card-image">
      
          <img src="images/standard.png">
          <span class="card-title">Standard Cars</span>
        
        </div>
        
        <div class="card-content">
          
          <p>Starting at $24.95 per day</p>
        
        </div>
        
        <div class="card-action">
          
          @if(Auth::check())

          <a class="teal-text accent-4" href="/rent/Standard">Rent Now</a>

          @else

          <a class="teal-text accent-4" href="/login">Rent Now</a>

          @endif
        
        </div>
    
      </div>
  
    </div>

    <div class="col s12 m6 l4">
      
      <div class="card hoverable">
    
        <div class="card-image">
      
          <img src="images/luxury.png">
          <span class="card-title">Luxury Cars</span>
        
        </div>
        
        <div class="card-content">
          
          <p>Starting at $39.00 per day</p>
        
        </div>
        
        <div class="card-action">
          
          @if(Auth::check())

          <a class="teal-text accent-4" href="/rent/Luxury">Rent Now</a>
          
          @else

          <a class="teal-text accent-4" href="/login">Rent Now</a>

          @endif

        </div>
    
      </div>
  
    </div>

  </div>
  


</div>

@stop
  
