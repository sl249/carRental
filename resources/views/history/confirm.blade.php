@extends('app')

@section('content')

<div class="container">

  <div class="row">
    
    <div class ="col s12 m12 l8 offset-l2">
      
      <div class="card ">

        <div class="card-content">

            <span class="card-title teal-text accent-4">Thank You for Your Rental!</span>

          <div class="row">
            
            <div class="col s12">


              <h6>&nbsp;&nbsp;&nbsp; Thank you for returning our <span class="teal-text accent-4">{{$car->year}} {{$car->manufacturer}} {{$car->model}}</span></h6> 
              <h6>&nbsp;&nbsp;&nbsp; We hope you enjoyed your rental!</h6> 

            </div>

          </div>

        </div>

        <div class="card-action">

            <a class="teal-text accent-4" href="/rentals/open">View Open Rentals</a>
    
        </div>

      </div>

    </div>

  </div>


@stop