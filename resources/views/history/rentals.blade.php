@extends('app')

@section('content')

<div class="container">

  <div class="row">

    <div class="col s12 m8 offset-m2 offset-l2 l8">
      
      @foreach($sectionArray as $section)

        @if($empty == false)
          
          <h4 class="header left-align teal-text accent-4 thin">&nbsp;{{$section}}</h4>

            @foreach($rentals as $rental)

              @if($rental->finMileage == null && $section == "Open")

                @foreach($cars as $car)

                  @if($car->id == $rental->car_id)

                    <div class="card-panel grey lighten-5 z-depth-1">
                      
                      <div class="row valign-wrapper">
                        <div class="col s2">
                          <img src="{{ URL::asset('images/carImages')}}/{{$car->manufacturer}}{{$car->model}}{{$car->year}}.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                        </div>
                        
                        <div class="col s8">
                          
                          <h4 class="teal-text accent-4 thin">{{$car->year}} {{$car->manufacturer}} {{$car->model}}</h4>
                          <h6><span class="teal-text accent-4"> Date of Rental:</span> {{$rental->created_at->format('m/d/Y')}}</h6>
                        
                        </div>
                      
                      </div>

                      <div class="card-action">

                        <a class="teal-text accent-4" href="/rentals/open/{{$rental->id}}">Return Car</a>
              
                      </div>

                    </div>

                    <br>

                  @else

                  @endif

                @endforeach

              @elseif($rental->finMileage != null && $section == "Closed")

                @foreach($cars as $car)

                  @if($car->id == $rental->car_id)

                    <div class="card-panel grey lighten-5 z-depth-1">
                            
                      <div class="row valign-wrapper">
                        <div class="col s2">
                          <img src="{{ URL::asset('images/carImages')}}/{{$car->manufacturer}}{{$car->model}}{{$car->year}}.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                        </div>
                        
                        <div class="col s8">
                          
                          <h4 class="teal-text accent-4 thin">{{$car->year}} {{$car->manufacturer}} {{$car->model}}</h4>
                          <h6><span class="teal-text accent-4"> Date of Rental:</span> {{$rental->created_at->format('m/d/Y')}}</h6>
                          <h6><span class="teal-text accent-4"> Return Mileage:</span> {{$rental->finMileage}} Miles</h6>
                        
                        </div>
                      
                      </div>

                      <div class="card-action">

                          <a class="teal-text accent-4" href="/rentals/closed/{{$rental->id}}">View Record</a>
                  
                      </div>
                    
                    </div>

                  @else

                  @endif

                @endforeach

              @endif

            @endforeach

        @else

        <br><br>
        <br><br>
        <br><br>
        <h2 class="thin center valign">No Avaiable Rentals</h2>

        @endif

      @endforeach

    </div>

  </div>

</div>

@stop