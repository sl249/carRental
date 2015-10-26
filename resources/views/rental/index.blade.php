@extends('app')

@section('content')

<div class="container">

  	@foreach ($sectionArray as $section)

  	<div class="row">

  		<h4 class="header left-align teal-text accent-4 thin">&nbsp;{{$section}}</h4>
  
	  	@foreach ($cars as $car)

	  		@if($car->type == $section)
			    <div class="col s12 m6 l4">
			      
			      <div class="card hoverable">
			    
			        <div class="card-image">
			      
			          <img src="{{ URL::asset('images/carImages')}}/{{$car->manufacturer}}{{$car->model}}{{$car->year}}.png">
			          <span class="card-title">{{$car->year}} {{$car->manufacturer}} {{$car->model}}</span>
			        
			        </div>
			        
			        <div class="card-action">
			          
			          <a class="teal-text accent-4 " href="/rent/{{$car->type}}/{{$car->id}}">Rent Now</a>
			        
			        </div>
			    
			      </div>
			  
			    </div>

			@else

			@endif

	   @endforeach

	   </div>

	@endforeach

  
  
  <br><br>
  <br><br>

</div>

@stop
