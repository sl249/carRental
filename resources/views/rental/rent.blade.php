@extends('app')

@section('content')

<div class="container">

  <div class="row">
    
    {!! Form::open(array('url' => 'rent/'.$car->type.'/'.$car->id.'/review', 'class'=>'col s12 m12 l8 offset-l2')) !!}
      
      <div class="card ">

        <div class="card-image">
        
            <img class="materialboxed" src="{{ URL::asset('images/carImages')}}/{{$car->manufacturer}}{{$car->model}}{{$car->year}}.png">
            <span class="card-title">{{$car->year}} {{$car->manufacturer}} {{$car->model}}</span>
          
        </div>

        <div class="card-content">

          <span class="card-title teal-text accent-4">Rental</span>
            
              {{ $errors->first('number') }}

          <div class="row">
            
            <div class="input-field col s12">
              

              {!! Form::hidden('id', $car->id)!!} 
              {!! Form::hidden('initMileage', $car->mileage)!!} 
              {!! Form::hidden('type', $car->type)!!} 

              {!! Form::input('number', 'numdays', null, array('class'=>'validate', 'required'=>'required'))!!} 

              <label for="numdays">Number of days</label>
            
            </div>
          
          

          <div class="row">
            
            <div class="col s12">

              <h6>&nbsp;&nbsp;&nbsp;<span class="teal-text accent-4"> Car Type:</span> {{$car->type}}</h6> 
              <h6>&nbsp;&nbsp;&nbsp;<span class="teal-text accent-4"> Starting Mileage:</span> {{$car->mileage}} Miles</h6>

              @if($car->type == "Luxury")

              <h6>&nbsp;&nbsp;&nbsp;<span class="teal-text accent-4"> Price Per Day:</span> $39.00</h6> 

              @elseif($car->type == "Standard")

              <h6>&nbsp;&nbsp;&nbsp;<span class="teal-text accent-4"> Price Per Day:</span> $24.95</h6> 

              @elseif($car->type == "Compact")

              <h6>&nbsp;&nbsp;&nbsp;<span class="teal-text accent-4"> Price Per Day:</span> $19.95</h6> 

              @endif

              <h6>&nbsp;&nbsp;&nbsp;<span class="teal-text accent-4"> Mileage Charge:</span> $0.32/Mile</h6> 

            </div>

          </div>

        </div>

        <div class="card-action">
            
            <button class="btn waves-effect waves-light" type="submit" name="action">Review
              
              <i class="material-icons right">send</i>
            
            </button>
    
        </div>

      </div>

    {!! Form::close() !!}

  </div>

</div>


@stop